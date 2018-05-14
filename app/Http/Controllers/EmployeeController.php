<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;
use App\City;
use App\EmployeeType;
use Validator;
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
        $rules = [];
        $double_ci = false;
        $ci = Employee::where('identity_card',$request->identity_card)->first();
        if(isset($ci->id))
            $double_ci = true;
        $biz_rules = [
            'double_ci' =>  $double_ci?'required':'',
        ];
        $rules=array_merge($rules,$biz_rules);
        $array_rules = [
            'employee_type_id'  =>  'required',
            'city_identity_card_id' =>  'required',
            'city_birth_id' =>  'required',
            'first_name'    =>  'required',
            'last_name' =>  'required',
            'identity_card' =>  'required',
            'birth_date'    =>  'required',            
        ];
        $rules=array_merge($rules,$array_rules);

        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){            
            return redirect(asset('employee/create'))
                ->withErrors($validator)
                ->withInput();            
        }       
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
        $rules = [];
        $double_ci = false;
        $ci = Employee::where('id','!=',$employee->id)->where('identity_card',$request->identity_card)->first();
        
        if(isset($ci->id))
            $double_ci = true;
        $biz_rules = [
            'double_ci' =>  $double_ci?'required':'',
        ];
        $rules=array_merge($rules,$biz_rules);
        $array_rules = [
            'employee_type_id'  =>  'required',
            'city_identity_card_id' =>  'required',
            'city_birth_id' =>  'required',
            'first_name'    =>  'required',
            'last_name' =>  'required',
            'identity_card' =>  'required',
            'birth_date'    =>  'required',            
        ];
        $rules=array_merge($rules,$array_rules);        
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){            
            return redirect(asset('employee/'.$employee->id.'/edit'))
                ->withErrors($validator)
                ->withInput();            
        }       
        
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
