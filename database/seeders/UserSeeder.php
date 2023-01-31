<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'avatar' => 'images\profiles\profile-default.jpg',
                'name' => 'Mamat Admin',
                'slug' => 'mamat-admin',
                'email' => 'administrator@gmail.com',
                'password' => Hash::make('1234567'),
                'role' => 'administrator',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'image' => 'images\profiles\profile-default.jpg',
                'name' => 'Wahyu Author',
                'slug' => 'wahyu-author',
                'email' => 'author@gmail.com',
                'password' => Hash::make('1234567'),
                'role' => 'author',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);
    }
}
