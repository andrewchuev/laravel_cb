<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'lng',
        'lat',
        'address',
        'city',
        'postcode',
    ];

    public function schedule()
    {
        return $this->hasMany(LocationSchedule::class);
    }
}
