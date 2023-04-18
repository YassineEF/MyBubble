<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Popping;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Popping>
 */
class PoppingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Popping::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->word(),
            'price' => fake()->randomFloat(2, 0, 100),
            'image' => fake()->word()
        ];
    }
}
