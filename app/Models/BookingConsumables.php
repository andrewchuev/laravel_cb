<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingConsumables extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_consignment_group_id',
        'consumable_id',
        'qty',
        'length',
        'width',
        'height',
        'weight',
    ];


    public function consumable()
    {
        return $this->belongsTo(Consumable::class);
    }
}
