<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = ['date', 'status', 'bill_id'];

    public function bill()
    {
        return $this->belongsTo(Bill::class, 'bill_id');
    }
}