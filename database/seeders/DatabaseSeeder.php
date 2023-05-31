<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(5)->create();

        User::create([
            'name' => 'superAdmin',
            'email' => 'superAdmin@gmail.com',
            'password' => bcrypt('1sampai8'),
        ]);

        $this->call([ArticlesSeeder::class]);
        $this->call([CategorySeeder::class]);
    }
}
