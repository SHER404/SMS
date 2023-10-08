<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolVisitor extends Model
{
    use HasFactory;
    protected $guarded = []; 
    public function class()
    {
        return $this->hasOne('App\Models\StudentClass', 'id', 'class_id');
    }
    public function studentClasses()
    {
        return $this->hasMany('App\Models\SchoolVisitorClass', 'visitor_id', 'id');
    }
}
