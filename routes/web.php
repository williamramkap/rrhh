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
    $data = [];
    // return view('print.temp');
    return \PDF::loadView('print.temp',$data)
        // ->setOption('page-width', '216')
        // ->setOption('page-height', '356')
        ->setPaper('letter')
        ->setOption('margin-bottom', 0)
        ->setOption('margin-left', 5)
        ->setOption('margin-right', 5)
        ->setOption('encoding', 'utf-8')
        ->stream("temp");

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('employee','EmployeeController');
Route::get('employee/{employee}/payroll','PayrollController@employee_payroll');
Route::get('payroll','PayrollController@index');