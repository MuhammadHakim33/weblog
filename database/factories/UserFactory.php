<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition()
    {
        $name = fake()->name;

        return [
            'id' => fake()->uuid(),
            'name' => $name,
            'slug' => Str::slug($name),
            'password' => Hash::make('1234567'),
            'avatar' => fake()->imageUrl(360, 360, 'animals', true),
        ];
    }
}
