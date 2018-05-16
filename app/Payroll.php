<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    //
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
    public function manager_entity()
    {
        return $this->belongsTo(ManagerEntity::class,'management_entity_id','id');
    }
    public function procedure()
    {
        return $this->belongsTo(Procedure::class);
    }
    public function discounts()
    {
        return $this->belongsToMany(Discount::class);
    }

}
