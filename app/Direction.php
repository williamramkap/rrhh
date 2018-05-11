<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Direction extends Model
{
    //
    public function units()
    {
        return $this->hasMany(Unit::class);
    }
}
