<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    //
    public function charge()
    {
        return $this->belongsTo(Charge::class);
    }
}
