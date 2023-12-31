<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeesAttendence extends Model
{
    use HasFactory;
    protected $guarded = []; 
     public function employee()
     {
         return $this->hasOne('App\Models\Employees', 'id', 'employees_id');
     }
}
