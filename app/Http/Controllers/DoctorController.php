<?php

namespace App\Http\Controllers;

use App\Cases;
use App\User;
use App\Doctor;
use Illuminate\Http\Request;
use App\Traits\ImageTrait;
use App\Helper\TokenGenerator;
use Illuminate\Support\Facades\Auth;
use PhpParser\Comment\Doc;

class DoctorController extends Controller
{
    use ImageTrait;

    public function dashboard()
    {
        $user_id = Auth::user()->id;

        $doctor = Doctor::where('user_id', $user_id)->first();

        $waiting_cases = [];
        $diagnosed_cases = [];
        $closed_cases = [];
        foreach ($doctor->cases as $c){
            if ($c->status == 'Closed') {
                array_push($closed_cases, Cases::find($c->id));
                continue;
            }
            $is_waiting = false;
            foreach ($c->wounds as $wound){
                foreach ($wound->progress as $p){
                    if($p->status == 'Waiting'){
                        $is_waiting = true;
                    }
                }
            }

            if($is_waiting){
                array_push($waiting_cases, Cases::find($c->id));
            }else{
                array_push($diagnosed_cases, Cases::find($c->id));
            }
        }
        $doctor['waiting_cases'] = $waiting_cases;
        $doctor['diagnosed_cases'] = $diagnosed_cases;
        $doctor['closed_cases'] = $closed_cases;

        return view('doctor.dashboard', [
            'doctor' => $doctor
        ]);

        //return $waiting_cases;
    }

    public function index()
    {
        $doctors = Doctor::all();
        return view('doctor.index', ['doctors' => $doctors]);
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        $doctor = Doctor::where('user_id', $user->id)->first();

        return view('doctor.show', ['doctor' => $doctor]);
    }
    public function create()
    {
        return view('doctor.create');
    }

    public function store(Request $request)
    {
        $doctor = $request->all();

        $user = User::create([
            'name' => $doctor['name'],
            'email' => $doctor['email'],
            'password' => bcrypt($doctor['password']),
        ]);

        $doctor['user_id'] = $user->id;
        $doctor['status'] = 'enable';
        $doctor['token'] = (new TokenGenerator())->generate('16');

        $image = $this->storeImage($doctor['profile_image'], 'profile');
        $doctor['profile_image'] = $image->id;


        Doctor::create($doctor);

        return redirect()->action('DoctorController@index')
            ->with(['status' => 'Create Success']);
    }

    public function edit($id)
    {
        $doctor = Doctor::findOrFail($id);
        $user = User::findOrFail($doctor->user_id);
        $doctor['email'] = $user->email;

        return view('doctor.edit', ['doctor' => $doctor]);
    }

    public function update(Request $request, $id)
    {
        $doctor = Doctor::findOrFail($id);
        $user = User::findOrFail($doctor->user_id);

        $user->email = $request->get('email');
        $doctor->name = $request->get('name');
        $user->name = $request->get('name');
        $doctor->expert = $request->get('expert');

        if($request->hasFile('profile_image')){
            $image = $this->storeImage($request->file('profile_image'), 'profile');
            $doctor->profile_image = $image->id;
        }
        $user->save();
        $doctor->save();

        return redirect()->action('DoctorController@index')
            ->with(['status' => 'Update Success']);
    }

    public function destroy($id)
    {
        $doctor = Doctor::findOrFail($id);
        $user = User::findOrFail($doctor->user_id);

        $doctor->delete();
        $user->delete();

        return redirect()->action('DoctorController@index')
            ->with(['status' => 'Delete Success']);

    }

    public function waitCase($id)
    {
        $waiting_cases = 0;

        $doctor = Doctor::where('user_id', $id)->first();

        if(sizeof($doctor) == 1){
            foreach ($doctor->cases as $c){
                $is_waiting = false;
                foreach ($c->wounds as $wound){
                    foreach ($wound->progress as $p){
                        if($p->status == 'Waiting'){
                            $is_waiting = true;
                        }
                    }
                }

                if($is_waiting){
                    $waiting_cases++;
                }
            }
        }

        return $waiting_cases;
    }
}
