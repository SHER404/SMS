<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaidFees extends Model
{
    protected $guarded = [];
    use HasFactory;
    public function Invoice_heads()
{
    return $this->hasMany('App\Models\InvoiceHead', 'invoice_id', 'invoice_id');
}
}

