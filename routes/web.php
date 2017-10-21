<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function (){

    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('image/show/{id}', 'ImageController@show');

    Route::get('doctor', 'DoctorController@index');

    Route::get('patient', 'PatientController@index');

    // profile
    Route::get('profile/{id}', 'HomeController@profile');


    Route::group(['prefix' => 'admin', 'middleware' => 'authAdmin'], function (){

        Route::get('dashboard', 'AdminController@dashboard');


        Route::get('doctor', 'DoctorController@index');
        Route::post('doctor', 'DoctorController@store');
        Route::get('doctor/create', 'DoctorController@create');
        Route::get('doctor/{id}', 'DoctorController@show');
        Route::get('doctor/{id}/edit', 'DoctorController@edit');
        Route::patch('doctor/{id}', 'DoctorController@update');
        Route::delete('doctor/{id}', 'DoctorController@destroy');


        Route::get('patient', 'PatientController@index');
        Route::post('patient', 'PatientController@store');
        Route::get('patient/create', 'PatientController@create');
        Route::get('patient/{id}', 'PatientController@show');
        Route::get('patient/{id}/edit', 'PatientController@edit');
        Route::patch('patient/{id}', 'PatientController@update');
        Route::delete('patient/{id}', 'PatientController@destroy');


        Route::get('case', 'CasesController@index');
        Route::post('case', 'CasesController@store');
        Route::get('case/create', 'CasesController@create');
        Route::get('case/{id}', 'CasesController@show');
        Route::get('case/{id}/edit', 'CasesController@edit');
        Route::patch('case/{id}', 'CasesController@update');
        Route::delete('case/{id}', 'CasesController@destroy');


        Route::post('wound', 'WoundController@store');
        Route::get('wound/create/{id}', 'WoundController@create');
        Route::get('wound/{id}', 'WoundController@show');

        Route::get('wound/progress/create', 'WoundController@createProgress');
        Route::get('wound/progress/{id}', 'WoundController@progress');


    });


    /*

    Doctor Can >>>
    [view profile],     [edit profile],
    [create patient],   [edit patient],
    [create case],      [edit case],
    [create wound],     [edit wound],

    Todo Fix update & edit route

    */
    Route::group(['prefix' => 'doctor','middleware' => 'authDoctor'], function (){

        // dashboard
        Route::get('dashboard', 'DoctorController@dashboard');
        // edit profile
        Route::get('doctor/{id}/edit', 'DoctorController@edit');
        // update profile
        Route::patch('doctor', 'DoctorController@update');



        Route::get('patient/create', 'PatientController@create');
        Route::post('patient', 'PatientController@store');
        Route::get('patient/{id}', 'PatientController@show');


        Route::get('case/create', 'CasesController@create');
        Route::post('case', 'CasesController@store');
        Route::get('case/{id}', 'CasesController@show');
        Route::get('case/{id}/edit', 'CasesController@edit');
        Route::patch('case/{id}', 'CasesController@update');


        Route::get('wound/create/{id}', 'WoundController@create');
        Route::post('wound', 'WoundController@store');
        Route::get('wound/{id}', 'WoundController@show');
        Route::get('wound/progress/{id}', 'WoundController@progress');
        Route::get('wound/progress/{id}/diagnose', 'WoundController@diagnoseProgress');
        Route::patch('wound/progress/{id}/diagnose', 'WoundController@storeDiagnose');

    });

});