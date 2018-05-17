<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PositionGroup extends Model
{
    public function positions()
    {
        return $this->hasMany(Position::class);
    }
}
