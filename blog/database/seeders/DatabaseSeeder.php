<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([UserSeeder::class]);
        $this->call([RoleSeeder::class]);
        $this->call([user_roleSeeder::class]);
        $this->call([PostSeeder::class]);
        $this->call([TagSeeder::class]);
        $this->call([CategorySeeder::class]);
        $this->call([post_tagSeeder::class]);
        $this->call([post_categorySeeder::class]);
    }
}
