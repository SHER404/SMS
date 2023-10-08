<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoices extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    public function Invoice_heads()
    {
        return $this->hasMany('App\Models\InvoiceHead', 'invoice_id', 'id');
    }
    public function student()
    {
        return $this->hasOne('App\Models\Students', 'id', 'student_id');
    }
    

    public function academicSession()
    {
        return $this->hasOne('App\Models\AcademicSession', 'id', 'session_id');
    }

    public function campus()
    {
        return $this->hasOne('App\Models\Campuses', 'id', 'campus_id');
    }
}
