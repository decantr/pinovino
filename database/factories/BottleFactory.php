<?php

namespace Database\Factories;

use App\Enums\WineType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bottle>
 */
class BottleFactory extends Factory
{
	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition(): array
	{
		return [
			'name' => $this->faker->streetName(),
			'vintage' => $this->faker->year(),
			'wine_type' => $this->faker->randomElement(WineType::cases()),
			'description' => $this->faker->paragraph(),
			'country' => $this->faker->country(),
			'region' => $this->faker->city(),
		];
	}
}
