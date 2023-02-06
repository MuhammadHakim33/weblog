<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Sluggable;

    protected $table = 'users';
    public $incrementing = false;

    protected $fillable = [
        'id',
        'name',
        'slug',
        'email',
        'password',
    ];

    /**
     * Relationships 
     */
    public function userRole()
    {
        return $this->hasOne(UserRole::class, 'user_id', 'id');
    }

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
