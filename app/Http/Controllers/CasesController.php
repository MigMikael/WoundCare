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
    public $status = [
        'healing' => 'Healing',
        'closed' => 'Closed'
    ];

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

    public function create(Request $request)
    {
        $patients = Patient::pluck('name', 'id');
        $doctors = Doctor::pluck('name', 'id');

        if($request->is('admin/*')){
            return view('cases.create', [
                'url' => 'admin/case',
                'patients' => $patients,
                'doctors' => $doctors
            ]);
        }elseif ($request->is('doctor/*')){
            return view('cases.create', [
                'url' => 'doctor/case',
                'patients' => $patients,
                'doctors' => $doctors
            ]);
        }else{
            return response()->json(['msg' => 'url pattern not found']);
        }
    }

    public function store(Request $request)
    {
        $cases = [
            'patient_id' => $request->get('patient_id'),
            'doctor_id' => $request->get('doctor_id'),
            'disease' => $request->get('disease'),
            'status' => $this->status['healing'],
            'next_appointment' => $request->get('next_date').' '.$request->get('next_time')
        ];
        Cases::create($cases);

        if($request->is('admin/*')){
            return redirect()->action('CasesController@index')
                ->with(['status' => 'Create Success']);

        }elseif($request->is('doctor/*')){
            return redirect()->action('DoctorController@dashboard')
                ->with(['status' => 'Create Success']);

        }else{
            return response()->json(['msg' => 'url pattern not found']);
        }
    }

    public function edit(Request $request, $id)
    {
        $patients = Patient::pluck('name', 'id');
        $doctors = Doctor::pluck('name', 'id');
        $case = Cases::findOrFail($id);

        if($request->is('admin/*')){
            return view('cases.edit', [
                'url' => 'admin/case/'.$case->id,
                'case' => $case,
                'patients' => $patients,
                'doctors' => $doctors
            ]);
        }elseif ($request->is('doctor/*')){
            return view('cases.edit', [
                'url' => 'doctor/case/'.$case->id,
                'case' => $case,
                'patients' => $patients,
                'doctors' => $doctors
            ]);
        }else{
            return response()->json(['msg' => 'url pattern not found']);
        }
    }

    public function update(Request $request, $id)
    {
        $case = Cases::findOrFail($id);
        $case->doctor_id = $request->get('doctor_id');
        $case->patient_id = $request->get('patient_id');
        $case->disease = $request->get('disease');
        $case->next_appointment = $request->get('next_date').' '.$request->get('next_time');
        $case->save();

        if($request->is('admin/*')){
            return redirect()->action('CasesController@index')
                ->with(['status' => 'Update Success']);

        }elseif($request->is('doctor/*')){
            return redirect()->action('DoctorController@dashboard')
                ->with(['status' => 'Update Success']);

        }else{
            return response()->json(['msg' => 'url pattern not found']);
        }
    }

    public function destroy($id)
    {
        $case = Cases::findOrFail($id);
        $case->delete();

        return redirect()->action('CasesController@index')
            ->with(['status' => 'Delete Success']);
    }

    public function changeStatus($id)
    {
        $case = Cases::findOrFail($id);
        $status = '';
        if($case->status == $this->status['healing']){
            $case->status = $this->status['closed'];
            $status = 'Close Case Success';
        }elseif($case->status == $this->status['closed']){
            $case->status = $this->status['healing'];
            $status = 'Reopen Case Success';
        }

        $case->save();

        return redirect()->action('CasesController@show', ['id' => $case->id])
            ->with(['status' => $status]);
    }
}
