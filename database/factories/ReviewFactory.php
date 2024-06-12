<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


class ReviewFactory extends Factory
{

    public function definition(): array
    {
        return [
            'book_id' => null,
            'review' => fake()->paragraph(3),
            'rating' => fake()->numberBetween(1, 5),
            'created_at' => fake()->dateTimeBetween('-2 years', 'now'),
            'updated_at' => function(array $attributes) {
                return fake()->dateTimeBetween($attributes['created_at'], 'now');
            }
        ];
    }

    public function good(): self
    {
        return $this->state([
            'rating' => fake()->numberBetween(4, 5),
        ]);
    }

    public function average(): self
    {
        return $this->state([
            'rating' => fake()->numberBetween(2, 4),
        ]);
    }

    public function bad(): self
    {
        return $this->state([
            'rating' => fake()->numberBetween(1, 2),
        ]);
    }
}
