<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Procedure extends Model
{
    //
    public function month()
    {
        return $this->belongsTo(Month::class);
    }
}
