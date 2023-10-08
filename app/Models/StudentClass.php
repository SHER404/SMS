<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentClass extends Model
{
    use HasFactory;
    protected $guarded = []; 
    public function students()
    {
        return $this->hasMany('App\Models\Students', 'class_id', 'id');
    }
    public function sections()
    {
        return $this->hasMany('App\Models\ClassSection', 'class_id', 'id');
    }
}
