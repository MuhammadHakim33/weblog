<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Sluggable, HasUuids;

    protected $table = 'users';

    public $incrementing = false;

    protected $fillable = [
        'id',
        'name',
        'slug',
        'email',
        'password',
        'avatar'
    ];

    /**
     * Relationships 
     */
    public function userRole()
    {
        return $this->hasOne(UserRole::class, 'user_id', 'id');
    }

    public function post()
    {
        return $this->hasMany(Post::class, 'user_id', 'id');
    }

    public static function boot() {
        parent::boot();
        self::deleting(function($user) {
             $user->userRole()->each(function($role) {
                $role->delete();
             });
        });
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
