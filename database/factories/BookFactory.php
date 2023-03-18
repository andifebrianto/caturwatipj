<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'judul' => $this->faker->sentence(mt_rand(2,5)),
            'penulis' => $this->faker->name(),
            'penerbit' => $this->faker->sentence(mt_rand(2,5)),
            'tahun' => $this->faker->numberBetween(1900, 2023),
            'jumlah' => $this->faker->numberBetween(1, 1000),
            'category_id' => mt_rand(1,20)
        ];
    }
}
