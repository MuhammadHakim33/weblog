<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_operators')->insert([
            'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
            'image' => 'profile-default.jpg',
            'name' => 'John Doe',
            'slug' => 'john-doe',
            'email' => 'john@gmail.com',
            'password' => Hash::make('12345'),
            'role' => 'administrator',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
