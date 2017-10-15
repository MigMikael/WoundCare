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

    Route::get('patient', 'PatientController@index')->name('patient.index');


    Route::group(['prefix' => 'admin', 'middleware' => 'authAdmin'], function (){

        Route::get('dashboard', 'AdminController@dashboard')->name('admin.dashboard');


        Route::get('doctor', 'DoctorController@index')->name('doctor.index');
        Route::post('doctor', 'DoctorController@store')->name('doctor.store');
        Route::get('doctor/create', 'DoctorController@create')->name('doctor.create');
        Route::get('doctor/{id}', 'DoctorController@show')->name('doctor.show');
        Route::get('doctor/{id}/edit', 'DoctorController@edit')->name('doctor.edit');
        Route::patch('doctor/{id}', 'DoctorController@update')->name('doctor.update');
        Route::delete('doctor/{id}', 'DoctorController@destroy')->name('doctor.destroy');

    });


    /*

    Doctor Can >>>
    [view profile], [edit profile], [create patient]

    */
    Route::group(['middleware' => 'authDoctor'], function (){

        // dashboard
        Route::get('doctor/dashboard', 'DoctorController@dashboard')->name('doctor.dashboard');

        // profile
        Route::get('doctor/{id}', 'DoctorController@show')->name('doctor.show');

        // edit profile
        Route::get('doctor/{id}/edit', 'DoctorController@edit')->name('doctor.edit');

        // update profile
        Route::patch('doctor', 'DoctorController@update')->name('doctor.update');



        Route::get('patient/create', 'PatientController@create')->name('patient.create');

        Route::post('patient', 'PatientController@store')->name('patient.store');

        Route::get('patient/{id}', 'PatientController@show')->name('patient.show');



        Route::get('cases/create/{id}', 'CasesController@create')->name('case.create');

        Route::post('cases', 'CasesController@store')->name('case.store');

        Route::get('cases/{id}', 'CasesController@show')->name('case.show');


        Route::get('wound/create/{id}', 'WoundController@create')->name('wound.create');

        Route::post('wound', 'WoundController@store')->name('wound.store');

        Route::get('wound/{id}', 'WoundController@show')->name('wound.show');

        Route::get('wound/progress/{id}', 'WoundController@progress')->name('wound.progress');

    });

});