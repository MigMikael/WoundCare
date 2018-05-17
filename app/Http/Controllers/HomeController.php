<?php

namespace App\Http\Controllers;

use App\Doctor;
use App\User;
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

        #$doctor = Doctor::where('user_id', $user->id)->first();
        if (Doctor::where('user_id', $user->id)->exists()){
            return redirect()->action('DoctorController@dashboard');
        }
        else{
            return redirect()->action('PatientController@dashboard');
        }

        //return view('/home');
    }

    public function profile($id)
    {
        $user = User::findOrFail($id);

        $doctor = Doctor::where('user_id', $id)->first();
        if (sizeof($doctor) == 1){
            $doctor['user'] = $user;
            return $doctor;
        }else{
            return $user;
        }
    }
}
