<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProfilFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'alamat' => $this->faker->address(),
            'email' => $this->faker->safeEmail(),
            'telepon' => $this->faker->phoneNumber(),
            'deskripsi' => $this->faker->paragraph(),
            'twitter' => $this->faker->firstNameFemale(),
            'facebook' => $this->faker->firstNameFemale(),
            'instagram' => $this->faker->firstNameFemale()
        ];
    }
}
