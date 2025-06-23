<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            'name' => 'admin',
            'description' => 'Administrator',
        ]);

        DB::table('roles')->insert([
            'name' => 'editor',
            'description' => 'editor and publisher',
        ]);

        DB::table('roles')->insert([
            'name' => 'author',
            'description' => 'only publisher',
        ]);


        DB::table('roles')->insert([
            'name' => 'contributor',
            'description' => 'can write post need aproval before publish',
        ]);

        DB::table('roles')->insert([
            'name' => 'subscriber',
            'description' => 'read & comment',
        ]);
    }
}
