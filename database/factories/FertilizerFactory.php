<?php

namespace Database\Factories;

use App\Models\Culture;
use Illuminate\Database\Eloquent\Factories\Factory;

class FertilizerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'nitrogen' => $this->faker->randomFloat(1, 1, 10000),
            'phosphorus' => $this->faker->randomFloat(1, 1, 10000),
            'potassium' => $this->faker->randomFloat(1, 1, 10000),
            'culture_id' => Culture::get()->random()->id,
            'district' => $this->faker->city(),
            'price' => $this->faker->randomFloat(1, 1, 10000),
            'description' => $this->faker->word(10),
            'target' => $this->faker->word(5),
        ];
    }
}
