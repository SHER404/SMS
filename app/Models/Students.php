<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function fee()
    {
        return $this->hasMany('App\Models\StudentsFee', 'student_id', 'id');
    }
    
    public function emergencyPhone()
    {
        return $this->hasMany('App\Models\EmergencyPhone', 'user_id', 'id');
    }


    public function invoices()
    {
        return $this->hasMany('App\Models\Invoices', 'student_id', 'id');
    }
    public function father()
    {
        return $this->belongsTo(StudentParent::class,'father_name');
    }
    public function family()
    {
       
        return $this->hasOne('App\Models\Family', 'custom_id', 'family_id');
    }
    public function class()
    {
        return $this->hasOne('App\Models\StudentClass', 'id', 'class_id');
    }
    public function classSection()
    {
        return $this->hasOne('App\Models\ClassSection', 'id', 'section_id');
    }
}