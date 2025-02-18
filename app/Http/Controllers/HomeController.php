<?php

namespace App\Http\Controllers;

use App\Helper\Helper;
use App\Models\Event;
use App\Models\Facility;
use App\Models\HeroImage;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function facilities()
    {
        $facilities = Facility::get();

        foreach ($facilities as $facility) {
            $facility->primary_image = Helper::GetImageUrl($facility->primary_image, false);
        }

        return response()->json($facilities);
    }

    public function heroImages(){
        $heroImages = HeroImage::all();
        foreach($heroImages as $heroImage){
            $heroImage->images = array_map(function ($image) {
                return Helper::GetImageUrl($image);
            }, $heroImage->images);
        }
        return response()->json($heroImages);
    }

    public function getFacilityImages($id)
    {
        $facility = Facility::find($id);
        $facility->images = array_map(function ($image) {
            return Helper::GetImageUrl($image);
        }, $facility->images);
        return response()->json($facility->images);
    }

    public function events(){
        $events = Event::orderBy('date', 'asc')->get();
        foreach ($events as $event) {
            $event['month'] = date('M', strtotime($event->date));
            $event['day'] = date('d', strtotime($event->date));
        }
        return $events;
    }
}
