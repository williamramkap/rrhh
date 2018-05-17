<?php

namespace App\Http\Controllers;

use App\Payroll;
use Illuminate\Http\Request;
use App\Employee;
use Carbon\Carbon;
use App\Discount;
use Prophecy\Promise\ReturnPromise;
use App\Procedure;
use App\Month;
use App\Contract;

class PayrollController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($year, $month)
    {
        $months = array_map(function ($v)
        {
            return strtolower($v);
        }, Month::pluck('name')->toArray());

        //add more validations
        if ($year <= Carbon::now()->year && in_array(strtolower($month), $months)) {
            return view('payroll.index', compact('year', 'month'));
        }else {
            return 'error';
        }

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
        $month = Month::whereRaw("lower(name) like '" . strtolower($request->month) . "'")->first();
        if (!$month) {
            return "month not found";
        }
        $procedure = Procedure::select('procedures.id')
                                ->leftJoin("months", 'months.id', '=', 'procedures.month_id')
                                ->whereRaw("lower(months.name) like '" . strtolower($request->month)."'")
                                ->where('year', '=', $request->year)
                                ->first();
        if(!$procedure){
            $procedure = new Procedure();
            $procedure->month_id = $month->id;
            $procedure->year = (int)$request->year;
            $procedure->name = "planilla de ".$request->year." ".$request->month;
            $procedure->save();
        }
        // Procedure::where('year', $request->year)->where('month', $request)
        foreach ($request->all() as $key => $value) {
            if (strpos($key, 'contract-') !== false) {
                preg_match('/\d{1,}/', $key, $matches);
                $id = (int) $matches[0];
                $contract = Contract::find($id);
                $payroll = $contract->payrolls()->where('procedure_id', $procedure->id)->first();
                if (!$payroll) {
                    $payroll = new Payroll();
                }
                $payroll->contract_id = $id;
                $payroll->procedure_id = $procedure->id;
                $payroll->name = "Personal Eventual - Mes ".$request->month ." de ".$request->year;
                $payroll->worked_days = $value[0];
                $base_wage = $contract->position->charge->base_wage ?? 1000;
                $quotable = ($base_wage/30)* $value[0];
                $total_discount_law = 0;
                $payroll->quotable = $quotable;
                foreach (Discount::where('discount_type_id', 1)->orderBy('id')->get() as $d) {
                    $total_discount_law = $total_discount_law + ( ($quotable * $d->percentage )/100);
                }
                $payroll->total_amount_discount_law = $total_discount_law;
                $payroll->net_salary = $quotable - $total_discount_law;
                $payroll->total_amount_discount_institution = floatval($value[1]);
                $total_discounts = $total_discount_law + floatval($value[1]);
                $payroll->total_discounts = $total_discounts;
                $payroll->payable_liquid = $quotable - $total_discounts;
                $payroll->save();
                foreach (Discount::where('discount_type_id', 1)->orderBy('id')->get() as $d) {
                    if ($payroll->discounts->contains($d->id)) {
                        $payroll->discounts()->updateExistingPivot($d->id, ['amount' => (($quotable * $d->percentage) / 100)]);
                    } else {
                        $payroll->discounts()->save($d, ['amount' => (($quotable * $d->percentage) / 100)]);
                    }
                }
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
    public function edit($year, $month)
    {
        $months = array_map(function ($v) {
            return strtolower($v);
        }, Month::pluck('name')->toArray());

        //add more validations
        if ($year <= Carbon::now()->year && in_array(strtolower($month), $months)) {
            return view('payroll.edit', compact('year', 'month'));
        } else {
            return 'error';
        }

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
