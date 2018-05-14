<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;
use App\City;
use App\EmployeeType;
class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::get();
        $data = [
            'employees' => $employees,
        ];        
        return view('employee.index',$data);   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::get();
        $employee_types = EmployeeType::get();
        $data = [
            'cities'  =>  $cities,
            'employee_types' =>  $employee_types,
        ];
        return view('employee.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $employee = new Employee();
        $employee->employee_type_id = $request->employee_type_id;
        $employee->city_identity_card_id = $request->city_identity_card_id;
        $employee->city_birth_id = $request->city_birth_id;
        $employee->first_name = $request->first_name;
        $employee->second_name = $request->second_name; 
        $employee->last_name = $request->last_name;
        $employee->mothers_last_name = $request->mothers_last_name; 
        $employee->identity_card = $request->identity_card; 
        $employee->birth_date = $request->birth_date;
        $employee->account_number = $request->account_number;
        $employee->gender = $request->gender;
        $employee->save();
        return redirect('employee');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        $data = [
            'employee'  =>  $employee,            
        ];
        return view('employee.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        $cities = City::get();
        $employee_types = EmployeeType::get();
        $data = [
            'employee'  =>  $employee,
            'cities' =>  $cities,
            'employee_types'    =>  $employee_types,
        ];
        return view('employee.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
    }
}
