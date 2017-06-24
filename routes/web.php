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

    Route::get('doctor', 'DoctorController@index')->name('doctor.index');

    Route::get('patient', 'PatientController@index')->name('patient.index');

    /*

    Admin Can >>>
    [create doctor], [delete doctor], [view all doctor], [view all patient]

    */
    Route::group(['middleware' => 'authAdmin'], function (){

        Route::get('doctor/create', 'DoctorController@create')->name('doctor.create');

        Route::post('doctor', 'DoctorController@store')->name('doctor.store');

        Route::delete('doctor', 'DoctorController@destroy')->name('doctor.destroy');

    });


    /*

    Doctor Can >>>
    [view profile], [edit profile], [create patient]

    */
    Route::group(['middleware' => 'authDoctor'], function (){

        Route::get('doctor/{id}', 'DoctorController@show')->name('doctor.show');

        Route::get('doctor/{id}/edit', 'DoctorController@edit')->name('doctor.edit');

        Route::patch('doctor', 'DoctorController@update')->name('doctor.update');



        Route::get('patient/{id}', 'PatientController@show')->name('patient.show');

        Route::get('patient/create', 'PatientController@create')->name('patient.create');

        Route::post('patient', 'PatientController@store')->name('patient.store');



        Route::get('cases/create/{id}', 'CasesController@create')->name('case.create');

        Route::post('cases', 'CasesController@store')->name('case.store');

        Route::get('cases/{id}', 'CasesController@show')->name('case.show');


        Route::get('wound/create/{id}', 'WoundController@create')->name('wound.create');

        Route::post('wound', 'WoundController@store')->name('wound.store');

        Route::get('wound/{id}', 'WoundController@show')->name('wound.show');

    });

});