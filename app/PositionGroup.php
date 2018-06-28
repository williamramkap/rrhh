<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PositionGroup extends Model
{
    public function positions()
    {
        return $this->hasMany(Position::class);
    }

    public function employer_number()
    {
        return $this->belongsTo(City::class, 'employer_number_id', 'id');
    }
}
