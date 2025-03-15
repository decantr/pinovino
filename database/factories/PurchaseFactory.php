<?php

namespace Database\Factories;

use App\Models\Bottle;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Purchase>
 */
class PurchaseFactory extends Factory
{
	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition(): array
	{
		return [
			'user_id' => User::factory(),
			'bottle_id' => Bottle::factory(),
			'date' => $this->faker->dateTime(),
			'cost' => $this->faker->numberBetween(1, 100),
			'store' => $this->faker->company(),
		];
	}

	public function setBottle(Bottle $bottle): self
	{
		return $this->state(
			fn(array $attributes) => [
				'bottle_id' => $bottle,
			]
		);
	}

	public function setUser(User $user): self
	{
		return $this->state(
			fn(array $attributes) => [
				'user_id' => $user,
			]
		);
	}
}
