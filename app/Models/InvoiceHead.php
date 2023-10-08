<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceHead extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function feeHead()
    {
        return $this->hasOne('App\Models\FeeHead', 'id', 'head_id');
    }
    public function fee()
    {
        return $this->hasMany('App\Models\StudentsFee', 'fee_head_id', 'id');
    }
}
