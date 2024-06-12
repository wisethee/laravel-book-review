<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Review;
use Illuminate\Database\Seeder;
use Random\RandomException;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * @throws RandomException
     */
    public function run(): void
    {
        Book::factory(33)->create()->each(function ($book) {
            $num_reviews = random_int(5, 12);
            Review::factory()->count($num_reviews)->good()->for($book)->create();
        });

        Book::factory(33)->create()->each(function ($book) {
            $num_reviews = random_int(5, 12);
            Review::factory()->count($num_reviews)->average()->for($book)->create();
        });

        Book::factory(34)->create()->each(function ($book) {
            $num_reviews = random_int(5, 12);
            Review::factory()->count($num_reviews)->bad()->for($book)->create();
        });
    }
}
