<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeroImage extends Model
{
    protected $fillable = [
        'images'
    ];

    protected $casts = [
        'images' => 'array',
    ];
}
