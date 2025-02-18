<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Outerweb\ImageLibrary\Facades\ImageLibrary as FacadesImageLibrary;
use Outerweb\ImageLibrary\Models\Image;

class Facility extends Model
{
    protected $fillable = [
        'name',
        'primary_image',
        'images'
    ];

    public function image()
    {
        return $this->belongsTo(Image::class, 'primary_image');
    }

    protected $casts = [
        'images' => 'array',
    ];

}
