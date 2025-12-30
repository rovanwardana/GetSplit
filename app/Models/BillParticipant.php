<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BillParticipant extends Model
{
    protected $fillable = [
        'bill_id',
        'user_id',
        'name',
        'payment_status',
        'amount_to_pay',
    ];

    public function bill()
    {
        return $this->belongsTo(Bill::class);
    }

    // Jika participant adalah user terdaftar
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Item yang diambil participant (custom split)
    public function items()
    {
        return $this->belongsToMany(
            BillItem::class,
            'bill_item_participant'
        );
    }
}

