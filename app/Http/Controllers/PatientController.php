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

        return redirect()->action('PatientController@index');
    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {

    }
}
