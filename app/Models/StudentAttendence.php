<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentAttendence extends Model
{
    use HasFactory;
     protected $guarded = []; 
     public function student()
     {
         return $this->hasOne('App\Models\Students', 'id', 'student_id');
     }
}
