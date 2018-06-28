<?php

namespace App;

use Carbon\Carbon;
use App\Helpers\Util;

class EmployeePayroll
{
    function __construct($payroll, $procedure)
    {
        $contract = $payroll->contract;
        $employee = $contract->employee;

        $this->ci_ext = Util::ciExt($employee);
        $this->full_name = Util::fullName($employee, 'uppercase', 'lastname_first');
        $this->account_number = $employee->account_number;
        $this->birth_date = Util::getDate($employee->birth_date);
        $this->gender = $employee->gender;
        $this->charge = $contract->position->charge->name;
        $this->position = $contract->position->name;
        $this->date_start = Util::getDate($contract->date_start);
        $this->date_end = Util::getDate($contract->date_end);
        $this->worked_days = $payroll->worked_days;
        $this->base_wage = $payroll->base_wage;
        $this->quotable = $this->base_wage * $this->worked_days / 30;
        $this->management_entity = $employee->management_entity->name;
        $this->discount_old = Util::get_percentage($this->quotable, $procedure->discount_old);
        $this->discount_common_risk = Util::get_percentage($this->quotable,$procedure->discount_common_risk);
        $this->discount_commission = Util::get_percentage($this->quotable,$procedure->discount_commission);
        $this->discount_solidary = Util::get_percentage($this->quotable, $procedure->discount_solidary);
        $this->discount_national = Util::get_percentage($this->quotable, $procedure->discount_national);
        $this->total_amount_discount_law = $this->discount_old + $this->discount_common_risk + $this->discount_commission + $this->discount_solidary + $this->discount_national;
        $this->net_salary = $this->quotable - $this->total_amount_discount_law;
        $this->discount_rc_iva = $payroll->discount_rc_iva;
        $this->total_amount_discount_institution = $payroll->total_amount_discount_institution;
        $this->total_discounts = $this->total_amount_discount_law + $this->total_amount_discount_institution + $this->discount_rc_iva;
        $this->payable_liquid = round(($this->quotable - $this->total_discounts), 2);
        $this->position_group = $contract->position->position_group->name;
        $this->valid_contract = Carbon::create($procedure->year, $procedure->month->id)->endOfMonth()->gte(Carbon::create(2018, 1, 20, 0, 0, 0));
    }
}