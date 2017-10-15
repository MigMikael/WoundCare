<?php

namespace App\Http\Controllers;

use App\Cases;
use App\Doctor;
use App\Patient;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $doctor_count = Doctor::count();
        $patient_count = Patient::count();
        $case_count = Cases::count();
        return view('admin.dashboard', [
            'doctor_count' => $doctor_count,
            'patient_count' => $patient_count,
            'case_count' => $case_count
        ]);
    }
}
