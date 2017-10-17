<?php

namespace App\Http\Controllers;

use App\Helper\TokenGenerator;
use App\User;
use App\Patient;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    use ImageTrait;

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
    public function create()
    {
        return view('patient.create');
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

        return redirect()->action('PatientController@index')
            ->with(['status' => 'Create Success']);
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
}
