<?php

namespace App\Http\Middleware;

use App\Doctor;
use Illuminate\Support\Facades\Auth;
use Closure;

class DoctorAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user_id = Auth::user()->id;

        #$doctor = Doctor::where('user_id', $user_id)->first();
        if (!Doctor::where('user_id', $user_id)->exists()){
            return response()->json(['msg' => 'request unauthorized 2']);
        }

        return $next($request);
    }
}
