<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;

class OperatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_operators')->insert([
            'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
            'image' => 'images\profiles\profile-default.jpg',
            'name' => 'Mamat',
            'slug' => 'mamat',
            'email' => 'mamat@gmail.com',
            'password' => Hash::make('12345'),
            'role' => 'author',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
