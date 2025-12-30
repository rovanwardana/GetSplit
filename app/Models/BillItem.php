<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BillItem extends Model
{
    protected $fillable = [
        'bill_id',
        'name',
        'qty',
        'price',
        'subtotal',
    ];

    public function bill()
    {
        return $this->belongsTo(Bill::class);
    }

    // Untuk custom split
    public function participants()
    {
        return $this->belongsToMany(
            BillParticipant::class,
            'bill_item_participant'
        );
    }
}

