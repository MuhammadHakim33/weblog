<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\Category;
use App\Models\UserRole;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition()
    {
        $title = fake()->unique()->realText(50);

        $user_id = UserRole::inRandomOrder()
                    ->where('level', '!=', 'subscriber')
                    ->first()
                    ->user_id;
                    
        $category_id = Category::inRandomOrder()->first()->id;

        return [
            'id' => Str::ulid(),
            'user_id' => $user_id,
            'title' => $title,
            'slug' => Str::slug($title),
            'thumbnail' => fake()->imageUrl(640, 480, 'animals', true),
            'body' => fake()->paragraph(8),
            'category_id' => $category_id,
            'status' => fake()->randomElement(['reviewed', 'published', 'rejected', 'draf']),
        ];
    }
}
