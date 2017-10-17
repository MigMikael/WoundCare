<?php

namespace App\Http\Controllers;

use App\Cases;
use App\Doctor;
use App\Helper\TokenGenerator;
use App\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CasesController extends Controller
{
    public function index()
    {
        $cases = Cases::all();
        return view('cases.index', ['cases' => $cases]);
    }

    public function show($id)
    {
        $cases = Cases::findOrFail($id);
        return view('cases.show', ['c' => $cases]);
    }

    public function create()
    {
        $patients = Patient::pluck('name', 'id');
        $doctors = Doctor::pluck('name', 'id');

        return view('cases.create', [
            'patients' => $patients,
            'doctors' => $doctors
        ]);
    }

    public function store(Request $request)
    {
        $cases = [
            'patient_id' => $request->get('patient_id'),
            'doctor_id' => $request->get('doctor_id'),
            'disease' => $request->get('disease'),
            'status' => 'Healing',
            'next_appointment' => $request->get('next_date').' '.$request->get('next_time')
        ];
        Cases::create($cases);

        return redirect()->action('CasesController@index')
            ->with(['ststus' => 'Create Success']);
    }

    public function edit($id)
    {
        $patients = Patient::pluck('name', 'id');
        $doctors = Doctor::pluck('name', 'id');
        $case = Cases::findOrFail($id);

        return view('cases.edit', [
            'case' => $case,
            'patients' => $patients,
            'doctors' => $doctors
        ]);
    }

    public function update(Request $request, $id)
    {
        $case = Cases::findOrFail($id);
        $case->doctor_id = $request->get('doctor_id');
        $case->patient_id = $request->get('patient_id');
        $case->disease = $request->get('disease');
        $case->next_appointment = $request->get('next_date').' '.$request->get('next_time');
        $case->save();

        return redirect()->action('CasesController@index')
            ->with(['status' => 'Update Success']);
    }

    public function destroy($id)
    {
        $case = Cases::findOrFail($id);
        $case->delete();

        return redirect()->action('CasesController@index')
            ->with(['status' => 'Delete Success']);
    }
}
