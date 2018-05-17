<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    //
    public function discount_type()
    {
        return $this->belongsTo(DiscountType::class);
    }
    public function payrolls()
    {
        return $this->belongsToMany(Payroll::class);
    }
}
