<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Operator extends Authenticatable
{
    use HasFactory;

    protected $table = 'tbl_operators';

    protected $fillable = [
        'id',
        'name',
        'slug',
        'email',
        'password',
        'role'
    ];
}
