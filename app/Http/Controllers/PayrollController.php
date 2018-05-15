<?php

namespace App\Http\Controllers;

use App\Payroll;
use Illuminate\Http\Request;
use App\Employee;
use Carbon\Carbon;
use App\Discount;
use Prophecy\Promise\ReturnPromise;
use App\Procedure;

class PayrollController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('payroll.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        return $request->all();
        // Procedure::where('year', $request->year)->where('month', $request)
        foreach ($request->all() as $key => $value) {
            if (strpos($key, 'employee-') !== false) {
                preg_match('/\d{1,}/', $key, $matches);
                $id = (int) $matches[0];
                $employee = Employee::find($id);
                $payroll = new Payroll();
                $payroll->employee_id = $id;
                $payroll->management_entity_id = $employee->management_entity->id;
                $payroll->procedure_id = 1;
                $payroll->name = "Personal Eventual - Mes ";
                $payroll->worked_days = $value[0];
                $base_wage = $employee->charge->first()->base_wage ?? 1000;
                $quotable = ($base_wage/Carbon::now()->daysInMonth)* $value[0];
                $total_discount_law = 0;
                $payroll->quotable = $quotable;
                foreach (Discount::where('discount_type_id', 1)->orderBy('id')->get() as $d) {
                    $total_discount_law = $total_discount_law + ( ($quotable * $d->percentage )/100);
                }
                $payroll->total_amount_discount_law = $total_discount_law;
                $payroll->total_amount_discount_institution = floatval($value[1]);
                $total_discounts = $total_discount_law + floatval($value[1]);
                $payroll->total_discounts = $total_discounts;
                $payroll->payable_liquid = $quotable - $total_discounts;
                $payroll->save();

            }
        }
        return Payroll::all();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Payroll  $payroll
     * @return \Illuminate\Http\Response
     */
    public function show(Payroll $payroll)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Payroll  $payroll
     * @return \Illuminate\Http\Response
     */
    public function edit(Payroll $payroll)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Payroll  $payroll
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payroll $payroll)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Payroll  $payroll
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payroll $payroll)
    {
        //
    }

    public function employee_payroll(Employee $employee){
        return $employee;
    }
}
