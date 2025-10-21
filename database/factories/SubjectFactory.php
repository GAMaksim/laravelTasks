<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SubjectFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->randomElement([
                'Matematika',
                'Fizika',
                'Kimyo',
                'Biologiya',
                'Ingliz tili',
                'Ona tili',
                'Tarix',
                'Informatika',
                'Geografiya',
                'Adabiyot'
            ]),
            'code' => strtoupper(fake()->unique()->lexify('???-???')),
        ];
    }
}