<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserComplaint extends Model
{
    protected $guarded = [];
    use HasFactory;
    public function class()
    {
        return $this->hasOne('App\Models\StudentClass', 'id', 'class_id');
    }
    public function classSection()
    {
        return $this->hasOne('App\Models\ClassSection', 'id', 'section_id');
    }
}
