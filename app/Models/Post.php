<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    use Sluggable;
    use HasUlids;

    protected $table = 'tbl_posts';

    protected $fillable = [
        'id',
        'creator_id',
        'title',
        'slug',
        'thumbnail',
        'body',
        'category_id',
        'status',
    ];

    /**
     * Relationships 
     */
    public function creator()
    {
        return $this->belongsTo(Operator::class, 'creator_id', 'id');
    }

    /**
     * Slug Model
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
