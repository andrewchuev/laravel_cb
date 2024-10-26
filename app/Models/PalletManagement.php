<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PalletManagement extends Model
{
    use HasFactory;

    protected $fillable = [
        'exchangeble',
        'transferable',
    ];

}
