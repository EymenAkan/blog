<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('1'),
        ]);

        DB::table('users')->insert([
            'name' => 'editor',
            'email' => 'editor@editor.com',
            'password' => bcrypt('2'),
        ]);

        DB::table('users')->insert([
            'name' => 'author',
            'email' => 'author@author.com',
            'password' => bcrypt('3'),
        ]);

        DB::table('users')->insert([
            'name' => 'contributor',
            'email' => 'contributor@contributor.com',
            'password' => bcrypt('4'),
        ]);

        DB::table('users')->insert([
            'name' => 'subscriber',
            'email' => 'subscriber@subscriber.com',
            'password' => bcrypt('5'),
        ]);

    }
}
