<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Cviebrock\EloquentSluggable\Sluggable;

class Operator extends Authenticatable
{
    use HasFactory;
    use Sluggable;

    protected $table = 'tbl_operators';

    public $incrementing = false;

    protected $fillable = [
        'id',
        'name',
        'slug',
        'email',
        'password',
        'role'
    ];

    /**
     * Slug Model
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
