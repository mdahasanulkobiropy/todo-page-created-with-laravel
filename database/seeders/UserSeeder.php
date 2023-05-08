<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            'name' =>'User1',
            'email' =>'user1@gmail.com',
            'password' => '12345678'
        ]);
        User::insert([
            'name' =>'User2',
            'email' =>'user2@gmail.com',
            'password' => '12345678'
        ]);
        User::insert([
            'name' =>'User3',
            'email' =>'user3@gmail.com',
            'password' => '12345678'
        ]);
        User::insert([
            'name' =>'User4',
            'email' =>'user4@gmail.com',
            'password' => '12345678'
        ]);
        User::insert([
            'name' =>'User5',
            'email' =>'user5@gmail.com',
            'password' => '12345678'
        ]);
    }
}
