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
                'id' => 'e51b3fc70d69436fae2d6e65d7d6c6c8',
                'name' => 'Mamat Admin',
                'slug' => 'mamat-admin',
                'email' => 'administrator@gmail.com',
                'password' => Hash::make('1234567'),
                'avatar' => 'https://i.ibb.co/ssm1215/x-Zk2-Ct-BVKXiy6pxijy-IT.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 'baa30f8bfd984cc296c9c840419baa42',
                'name' => 'Wahyu Author',
                'slug' => 'wahyu-author',
                'email' => 'author@gmail.com',
                'password' => Hash::make('1234567'),
                'avatar' => 'https://i.ibb.co/ssm1215/x-Zk2-Ct-BVKXiy6pxijy-IT.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 'bfecdcc0cc684468b56ddc429b46441c',
                'name' => 'Zaki Subs',
                'slug' => 'zaki-subs',
                'email' => 'subscriber@gmail.com',
                'password' => Hash::make('1234567'),
                'avatar' => 'https://i.ibb.co/ssm1215/x-Zk2-Ct-BVKXiy6pxijy-IT.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);
    }
}