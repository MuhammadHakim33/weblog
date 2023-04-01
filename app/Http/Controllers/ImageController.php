<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class ImageController extends Controller
{
     /**
     * Upload image to imgbb server
     */
    public static function upload($image)
    {
        $url = "https://api.imgbb.com/1/upload?";

        $response = Http::attach(
            'image', 
            file_get_contents($image), 
            Str::random(20))->post($url . 'key=' . env('IMGBB_API_KEY'));

        return $response->json();
    }
}
