<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\Post;
use App\Models\UserRole;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    protected $model = Comment::class;
    
    public function definition()
    {
        $user_id = UserRole::inRandomOrder()->first()->user_id;
        
        $post_id = Post::inRandomOrder()->first()->id;

        return [
            'id' => fake()->uuid(),
            'user_id' => $user_id,
            'post_id' => $post_id,
            'comment' => fake()->realText(100),
        ];
    }
}
