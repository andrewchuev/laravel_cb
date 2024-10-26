<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingPalletManagement extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_id',
        'pallet_management_id',
        'qty',
        'pallet_method',
        'account_number',
    ];

    public function palletManagement()
    {
        return $this->belongsTo(PalletManagement::class);
    }
}
