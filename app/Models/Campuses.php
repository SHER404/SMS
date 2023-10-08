<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campuses extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function session()
    {
        return $this->hasOne('App\Models\AcademicSession', 'id', 'active_session');
    }
}
