<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiscountType extends Model
{
    public function discounts()
    {
        return $this->hasMany(Discount::class);
    }
}
