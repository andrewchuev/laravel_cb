<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'key',
        'value',
        'type',
    ];

    protected $casts = [
        //'value' => 'json|string',
    ];
}
