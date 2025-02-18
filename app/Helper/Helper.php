<?php

namespace App\Helper;
use Outerweb\ImageLibrary\Facades\ImageLibrary as FacadesImageLibrary;

class Helper
{

    public static function GetImageUrl($id,$orginal=true)
    {

        $image = FacadesImageLibrary::imageModel()::find($id);
        if($orginal){
            return $image ? url("storage/{$image->uuid}/original.png") : null;
        }
        return $image ? url("storage/{$image->uuid}/filament-thumbnail.{$image->file_extension}") : null;
    }
}
