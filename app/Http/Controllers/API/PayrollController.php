<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Payroll;
use App\Month;
use App\Procedure;
use App\Employee;
use App\Helpers\Util;

class PayrollController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $month = Month::whereRaw("lower(name) like '" . strtolower($request->month) . "'")->first();
        if (!$month) {
            return "month not found";
        }
        $procedure = Procedure::select('procedures.id')
            ->leftJoin("months", 'months.id', '=', 'procedures.month_id')
            ->whereRaw("lower(months.name) like '" . strtolower($request->month) . "'")
            ->where('year', '=', $request->year)
            ->first();
        $payrolls = Payroll::where('procedure_id', '=', $procedure->id)->get();
        foreach ($payrolls as $key => $payroll) {
            $contract = $payroll->contract;
            $position = $contract->position;
            $charge = $position->charge;
            $employee = $contract->employee;
            $payroll->contract_id = $contract->id;
            $payroll->identity_card = $employee->identity_card;
            $payroll->employee_id = $employee->id;
            $payroll->city_identity_card = $employee->city_identity_card->shortened;
            $payroll->first_name = $employee->first_name;
            $payroll->second_name = $employee->second_name;
            $payroll->surname_husband = $employee->surname_husband;
            $payroll->last_name = $employee->last_name;
            $payroll->mothers_last_name = $employee->mothers_last_name;
            $payroll->birth_date = $employee->birth_date;
            $payroll->account_number = $employee->account_number;
            $payroll->charge = $charge->name;
            $payroll->position = $position->name;
            $payroll->base_wage = $charge->base_wage;
            $payroll->management_entity = $employee->management_entity->name;
        }
        $total = $payrolls->count();
        return response()->json(['payrolls' => $payrolls->toArray(), 'total' => $total]);
    }

    private function getFormattedData($year, $monthReq)
    {
        $month = Month::whereRaw("lower(name) like '" . strtolower($monthReq) . "'")->first();
        if (!$month) {
            return array(
                "code" => 400,
                "error" => true,
                "message" => "Mes inexistente",
                "data" => null
            );
        }
      
        $procedure = Procedure::where('month_id', $month->id)->where('year', $year)->select()->first();

        if (isset($procedure->id)) {
            $employees = array();
            $totals = (object)array(
                'base_wage' => 0,
                'quotable' => 0,
                'discount_old' => 0,
                'discount_common_risk' => 0,
                'discount_commission' => 0,
                'discount_solidary' => 0,
                'discount_national' => 0,
                'total_amount_discount_law' => 0,
                'net_salary' => 0,
                'discount_rc_iva' => 0,
                'total_amount_discount_institution' => 0,
                'total_discounts' => 0,
                'payable_liquid' => 0,
            );

            $payrolls = Payroll::where('procedure_id',$procedure->id)->get();
            foreach ($payrolls as $key => $payroll) {
                $contract = $payroll->contract;
                $employee = $contract->employee;

                $e = (object)array(
                    "ci_ext" => Util::ciExt($employee),
                    "full_name" => Util::fullName($employee, 'uppercase', 'lastname_first'),
                    "account_number" => $employee->account_number,
                    "birth_date" => Util::getDate($employee->birth_date),
                    "gender" => $employee->gender,
                    "charge" => $contract->position->charge->name,
                    "position" => $contract->position->name,
                    "date_start" => Util::getDate($contract->date_start),
                    "date_end" => Util::getDate($contract->date_end),
                    "worked_days" => $payroll->worked_days,
                    "base_wage" => $payroll->base_wage,
                    "quotable" => $payroll->quotable,
                    "management_entity" => $employee->management_entity->name,
                    "discount_old" => $payroll->discount_old,
                    "discount_common_risk" => $payroll->discount_common_risk,
                    "discount_commission" => $payroll->discount_commission,
                    "discount_solidary" => $payroll->discount_solidary,
                    "discount_national" => $payroll->discount_national,
                    "total_amount_discount_law" => $payroll->total_amount_discount_law,
                    "net_salary" => $payroll->net_salary,
                    "discount_rc_iva" => $payroll->discount_rc_iva,
                    "total_amount_discount_institution" => $payroll->total_amount_discount_institution,
                    "total_discounts" => $payroll->total_discounts,
                    "payable_liquid" => $payroll->payable_liquid,
                    "position_group" => $contract->position->position_group->name
                );
               
                $employees[] = $e;

                $totals->base_wage += $e->base_wage;
                $totals->quotable += $e->quotable;
                $totals->discount_old += $e->discount_old;
                $totals->discount_common_risk += $e->discount_common_risk;
                $totals->discount_commission += $e->discount_commission;
                $totals->discount_solidary += $e->discount_solidary;
                $totals->discount_national += $e->discount_national;
                $totals->total_amount_discount_law += $e->total_amount_discount_law;
                $totals->net_salary += $e->net_salary;
                $totals->discount_rc_iva += $e->discount_rc_iva;
                $totals->total_amount_discount_institution += $e->total_amount_discount_institution;
                $totals->total_discounts += $e->total_discounts;
                $totals->payable_liquid += $e->payable_liquid;
            }
        } else {
            return array(
                "code" => 404,
                "error" => true,
                "message" => "Planilla inexistente",
                "data" => null
            );
        }

        return array(
            "code" => 200,
            "error" => false,
            "message" => "Planilla generada con éxito",
            "data" => [
                'totals' => $totals,
                'employees' => $employees,
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($type, $month, $year)
    {
        return response()->json($this->getFormattedData($month, $year), 200);

        // $data = $this->getFormattedData($month, $year);
        // \Debugbar::info($data);
        // return view('payroll.print-A1', $data);

        // TODO PDF stream

        // switch ($type) {
        //     case 'A1':
        //         $file_name= "Planilla de Haberes A1.pdf";
        //         $data = [
        //             "title" => "TITULO"
        //         ];
        //         break;
        //     default:
        //         return response()->json([
        //             'error' => true,
        //             'message' => 'No se encuentra la planilla',
        //             'data' => null
        //         ]);
        // }

        // return \PDF::loadView('payroll.print-'.$type, $data)
        //     ->setOption('page-width', '216')
        //     ->setOption('page-height', '356')
        //     ->setOrientation('landscape')
        //     ->setOption('margin-top',0)
        //     ->setOption('margin-bottom', 0)
        //     ->setOption('margin-left', 0)
        //     ->setOption('margin-right', 0)
        //     ->setOption('encoding', 'utf-8')
        //     ->stream($file_name);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
