<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    //
    public function employee_type()
    {
        return $this->belongsTo(EmployeeType::class,'employee_type_id','id');
    }

    public function city_identity_card()
    {
        return $this->belongsTo(City::class, 'city_identity_card_id', 'id');
    }

    public function city_birth()
    {
        return $this->belongsTo(City::class, 'city_birth_id', 'id');
    }
    public function positions()
    {
        return $this->hasMany(Position::class);
    }
    public function management_entity()
    {
        return $this->belongsTo(ManagerEntity::class, 'management_entity_id', 'id');
    }
    public function group_job()
    {
        return $this->belongsTo(GroupJob::class,'group_job_id','id');
    }
}
