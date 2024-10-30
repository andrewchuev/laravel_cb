<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Location extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'lng', 'lat', 'address', 'city', 'postcode'];

    public function schedules(): HasMany
    {
        return $this->hasMany(LocationSchedule::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function area()
    {
        return $this->belongsTo(Area::class);
    }
}
