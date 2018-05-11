<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    //
    public function direction()
    {
        return $this->belongsTo(Direction::class);
    }

}
