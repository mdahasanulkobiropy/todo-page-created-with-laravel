<?php

namespace Database\Seeders;

use App\Models\ThemeToggole;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ThemeToggoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ThemeToggole::insert([
            'themestatus' =>'0',
        ]);
    }
}
