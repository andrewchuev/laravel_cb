<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingConsignment extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_consignment_group_id',
        'consignment_id',
        'qty',
        'length',
        'width',
        'height',
        'weight',
    ];

    public function consignment()
    {
        return $this->belongsTo(Consignment::class);
    }
}
