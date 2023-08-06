<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\Post;
use App\Models\UserRole;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    protected $mode = Comment::class;
    
    public function definition()
    {
        $user_id = UserRole::inRandomOrder()
                    ->where('level', '!=', 'subscriber')
                    ->first()
                    ->user_id;
        
        $post_id = Post::inRandomOrder()->first()->id;

        return [
            'id' => fake()->uuid(),
            'user_id' => $user_id,
            'post_id' => $post_id,
            'comment' => fake()->realText(100),
            'parent_comment_id' => ''
        ];
    }
}
