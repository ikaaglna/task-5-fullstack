<?php

namespace Database\Seeders;

use App\Models\Articles;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Articles::create([
            'title' => 'Coding is my favorite',
            'content' => 'Coding is my favorite',
            'image' => 'coding.png',
            'user_id' => 1,
            'category_id' => 1
        ]);

        Articles::create([
            'title' => 'My Life',
            'content' => 'My Life',
            'image' => 'life.png',
            'user_id' => 1,
            'category_id' => 2
        ]);
    }
}
