<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tag::insert([
            'name' =>'Team',
            'color' => '#802020',

        ]);
        Tag::insert([
            'name' =>'Low',
            'color' => '#32a852',
        ]);
        Tag::insert([
            'name' =>'High',
            'color' => '#26486e',
        ]);
        Tag::insert([
            'name' =>'Meduim',
            'color' => '#4b4d4f',
        ]);

    }
}
