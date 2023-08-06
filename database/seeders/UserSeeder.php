<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserRole;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()
                ->count(3)
                ->sequence(
                    ['email' => 'administrator@gmail.com'],
                    ['email' => 'author@gmail.com'],
                    ['email' => 'subscriber@gmail.com'],
                )
                ->has(
                    UserRole::factory()
                                ->count(1)
                                ->sequence(
                                    ['level' => 'administrator'],
                                    ['level' => 'author'],
                                    ['level' => 'subscriber'],
                                )
                                ->state(function (array $attributes, User $user) {
                                    return ['user_id' => $user->id];
                                })
                )
                ->create();
    }
}