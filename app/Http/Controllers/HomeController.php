<?php

namespace App\Http\Controllers;

use App\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // redirect to dashboard
        $user = Auth::user();

        if($user->name == 'admin'){
            return redirect()->action('AdminController@dashboard');
        }

        $doctor = Doctor::where('user_id', $user->id)->first();
        if (sizeof($doctor) == 1){
            return redirect()->action('DoctorController@dashboard');
        }
        else{
            return redirect()->action('PatientController@dashboard');
        }

        //return view('/home');
    }
}
