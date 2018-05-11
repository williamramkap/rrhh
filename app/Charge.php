<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Charge extends Model
{
    //
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
}
