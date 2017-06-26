<?php

namespace App\Http\Controllers;

use App\Cases;
use App\Doctor;
use App\Helper\TokenGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CasesController extends Controller
{
    public function show($id)
    {
        $cases = Cases::findOrFail($id);
        return view('cases.show', ['c' => $cases]);
    }

    public function create($id)
    {
        return view('cases.create', ['patient_id' => $id]);
    }

    public function store(Request $request)
    {
        $doctor = Doctor::where('user_id',Auth::user()->id)->first();

        $cases = [
            'patient_id' => $request->get('patient_id'),
            'doctor_id' => $doctor->id,
            'disease' => $request->get('disease'),
            'status' => 'Healing',
            'next_appointment' => $request->get('next_date').' '.$request->get('next_time')
        ];
        Cases::create($cases);

        return redirect()->action('DoctorController@dashboard');
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
