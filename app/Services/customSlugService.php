<?php

namespace App\Services;

use \Cviebrock\EloquentSluggable\Services\SlugService;

class customSlugService 
{
    public function slug($key, $models)
    {
        return SlugService::createSlug($models, 'slug', $key);
    }
}