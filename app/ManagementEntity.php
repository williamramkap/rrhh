<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ManagementEntity extends Model
{
    protected $table = "management_entities";

    protected $notFoundMessage = 'Entidad AFP inexistente';

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
}
