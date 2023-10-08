<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeeHead extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function Invoice_heads()
    {
        return $this->hasMany('App\Models\InvoiceHead', 'head_id', 'id');
    }
}
