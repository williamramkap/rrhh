<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiscountPayroll extends Model
{
    //
    protected $table = "discount_payroll";

    public function payroll()
    {
        return $this->belongsTo(Payroll::class);
    }
    public function discount()
    {
        return $this->belongsTo(Discount::class);
    }
}
