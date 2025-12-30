<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\BillItem;
use App\Models\BillParticipant;
use App\Models\User;

class Bill extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'type',
        'split_method',
        'bill_date',
        'due_date',
        'tax',
        'discount',
        'total_amount',
        'notes',
    ];

    // Creator bill
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Items dalam bill
    public function items()
    {
        return $this->hasMany(BillItem::class);
    }

    // Participants dalam bill
    public function participants()
    {
        return $this->hasMany(BillParticipant::class);
    }


}