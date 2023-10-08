<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentsFee extends Model
{
    
    protected $guarded = [];
    use HasFactory;
    public function feeHead()
    {
        return $this->hasOne('App\Models\FeeHead', 'id', 'fee_head_id');
    }
}
