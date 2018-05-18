<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Procedure;

use \Milon\Barcode\DNS1D;
use \Milon\Barcode\DNS2D;
use App\Helpers\Util;

class TicketController extends Controller
{
    public function print($year, $month)
    {
    
        $procedure = Procedure::select('procedures.id')
                        ->leftJoin("months", 'months.id', '=', 'procedures.month_id')
                        ->whereRaw("lower(months.name) like '" . strtolower($month) . "'")
                        ->where('year', '=', $year)
                        ->first();
        if (!$procedure) {
            return "procedure not found";
        }
        $payrolls = $procedure->payrolls()->skip(5)->take(10)->get();
        // $payrolls = $procedure->payrolls;
        foreach ($payrolls as $key => $payroll) {
            $contract = $payroll->contract;
            $position = $contract->position;
            $charge = $position->charge;
            $employee = $contract->employee;
            $payroll->contract_id = $contract->id;
            $payroll->ci_ext = Util::ciExt($employee);
            $payroll->employee_id = $employee->id;
            $payroll->city_identity_card = $employee->city_identity_card->shortened;
            $payroll->full_name = Util::fullName($employee);
            $payroll->birth_date = $employee->birth_date;
            $payroll->account_number = $employee->account_number;
            $payroll->charge = $charge->name;
            $payroll->position = $position->name;
            $payroll->base_wage = $charge->base_wage;
            $payroll->management_entity = $employee->management_entity->name;
            $payroll->code_image = \DNS2D::getBarcodePNG(($payroll->id.' '. $contract->id.' '. $position->id.' '. $charge->id . ' ' . $employee->id), "PDF417", 3, 33, array(1, 1, 1));
        }


        $data = [
            'payrolls' => $payrolls,
            'procedure' => Procedure::find($procedure->id)->with('month')->first(),
        ];
        // return view('print.temp');
        // return view('tickets.print',$data);
        return \PDF::loadView('tickets.print',$data)
            ->setOption('page-width', '216')
            ->setOption('page-height', '356')
            // ->setPaper('letter')
            ->setOption('margin-top',0.5)
            ->setOption('margin-bottom', 0)
            ->setOption('margin-left', 4)
            ->setOption('margin-right', 5)
            ->setOption('encoding', 'utf-8')
            ->stream("temp");

    }
}
