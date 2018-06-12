<?php

namespace App\Http\Controllers;

use App\Helper\TokenGenerator;
use App\User;
use App\Patient;
use App\Traits\ImageTrait;
use App\Wound;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PatientController extends Controller
{
    use ImageTrait;

    public function dashboard()
    {
        $user_id = Auth::user()->id;

        $patient = Patient::where('user_id', $user_id)->first();

        foreach ($patient->cases as $case){
            $case->wounds;
        }

        #return $patient;
        return view('patient.dashboard', ['patient' => $patient]);
    }

    public function index()
    {
        $patients = Patient::all();
        return view('patient.index', ['patients' => $patients]);
    }

    public function show($id)
    {
        $patient = Patient::findOrFail($id);
        return view('patient.show', ['patient' => $patient]);
    }

    public function create(Request $request)
    {
        if($request->is('admin/*')){
            return view('patient.create', [
                'url' => 'admin/patient'
            ]);
        }elseif ($request->is('doctor/*')){
            return view('patient.create', [
                'url' => 'doctor/patient'
            ]);
        }else{
            return response()->json(['msg' => 'url pattern not found']);
        }
    }

    public function store(Request $request)
    {
        $patient = $request->all();

        $user = User::create([
            'name' => $patient['name'],
            'email' => $patient['email'],
            'password' => bcrypt($patient['password']),
        ]);

        $patient['user_id'] = $user->id;
        $patient['status'] = 'enable';
        $patient['token'] = (new TokenGenerator())->generate('16');

        $image = $this->storeImage($patient['profile_image'], 'profile');
        $patient['profile_image'] = $image->id;
        Patient::create($patient);

        if($request->is('admin/*')){
            return redirect()->action('PatientController@index')
                ->with(['status' => 'Create Success']);
        }elseif ($request->is('doctor/*')){
            return redirect()->action('CasesController@create')
                ->with(['status' => 'Create Success']);
        }else{
            return response()->json(['error' => 'url pattern not found']);
        }
    }

    public function edit($id)
    {
        $patient = Patient::findOrFail($id);
        $user = User::findOrFail($patient->user_id);
        $patient['email'] = $user->email;

        return view('patient.edit', ['patient' => $patient]);
    }

    public function update(Request $request, $id)
    {
        $patient = Patient::findOrFail($id);
        $user = User::findOrFail($patient->user_id);

        $user->email = $request->get('email');
        $patient->name = $request->get('name');
        $patient->gender = $request->get('gender');
        $patient->birthday = $request->get('birthday');
        $patient->address = $request->get('address');
        $patient->phone_number = $request->get('phone_number');
        $patient->congenital_disease = $request->get('congenital_disease');
        $patient->allergic = $request->get('allergic');

        if($request->hasFile('profile_image')){
            $image = $this->storeImage($patient['profile_image'], 'profile');
            $patient->profile_image = $image->id;
        }

        $user->save();
        $patient->save();

        return redirect()->action('PatientController@index')
            ->with(['status' => 'Update Success']);

    }

    public function destroy($id)
    {
        $patient = Patient::findOrFail($id);
        $user = User::findOrFail($patient->user_id);

        $patient->delete();
        $user->delete();

        return redirect()->action('PatientController@index')
            ->with(['status' => 'Delete Success']);
    }

    public function takeImage($id)
    {
        $wound = Wound::findOrFail($id);
        return view('patient.takePic', ['wound' => $wound]);
    }
}
