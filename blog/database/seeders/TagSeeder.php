<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tags')->insert([
            'name' => 'Travel',
            'slug' => 'travel',
            'theme_color' => '#ba652c',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('tags')->insert([
            'name' => 'Technology',
            'slug' => 'technology',
            'theme_color' => '#3b82f6',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('tags')->insert([
            'name' => 'Farm',
            'slug' => 'farm',
            'theme_color' => '#22c55e',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
