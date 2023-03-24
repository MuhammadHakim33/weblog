<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class ImageController extends Controller
{
    public function upload($thumbnail)
    {
        $response = Http::attach('image', file_get_contents($thumbnail), Str::random(20))->post('https://api.imgbb.com/1/upload?key=f95c3b41dadc0d6da5d0979f1825ad54');
        
        return $response->json();
    }
}
