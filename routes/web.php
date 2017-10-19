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

        Route::get('dashboard', 'AdminController@dashboard')->name('admin.dashboard');


        Route::get('doctor', 'DoctorController@index')->name('doctor.index');
        Route::post('doctor', 'DoctorController@store')->name('doctor.store');
        Route::get('doctor/create', 'DoctorController@create')->name('doctor.create');
        Route::get('doctor/{id}', 'DoctorController@show')->name('doctor.show');
        Route::get('doctor/{id}/edit', 'DoctorController@edit')->name('doctor.edit');
        Route::patch('doctor/{id}', 'DoctorController@update')->name('doctor.update');
        Route::delete('doctor/{id}', 'DoctorController@destroy')->name('doctor.destroy');


        Route::get('patient', 'PatientController@index')->name('patient.index');
        Route::post('patient', 'PatientController@store')->name('patient.store');
        Route::get('patient/create', 'PatientController@create')->name('patient.create');
        Route::get('patient/{id}', 'PatientController@show')->name('patient.show');
        Route::get('patient/{id}/edit', 'PatientController@edit')->name('patient.edit');
        Route::patch('patient/{id}', 'PatientController@update')->name('patient.update');
        Route::delete('patient/{id}', 'PatientController@destroy')->name('patient.destroy');


        Route::get('case', 'CasesController@index')->name('case.index');
        Route::post('case', 'CasesController@store')->name('case.store');
        Route::get('case/create', 'CasesController@create')->name('case.create');
        Route::get('case/{id}', 'CasesController@show')->name('case.show');
        Route::get('case/{id}/edit', 'CasesController@edit')->name('case.edit');
        Route::patch('case/{id}', 'CasesController@update')->name('case.update');
        Route::delete('case/{id}', 'CasesController@destroy')->name('case.destroy');


        Route::post('wound', 'WoundController@store')->name('wound.store');
        Route::get('wound/create/{id}', 'WoundController@create')->name('wound.create');
        Route::get('wound/{id}', 'WoundController@show')->name('wound.show');

        Route::get('wound/progress/create', 'WoundController@createProgress')->name('progress.create');
        Route::get('wound/progress/{id}', 'WoundController@progress')->name('wound.progress');


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


        Route::get('wound/create/{id}', 'WoundController@create');
        Route::post('wound', 'WoundController@store');
        Route::get('wound/{id}', 'WoundController@show');
        Route::get('wound/progress/{id}', 'WoundController@progress');

    });

});