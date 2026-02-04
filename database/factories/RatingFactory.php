<?php

namespace Database\Factories;

use App\Models\Bottle;
use App\Models\Purchase;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rating>
 */
class RatingFactory extends Factory
{
	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition(): array {
		return [
			'user_id' => User::factory(),
			'bottle_id' => Bottle::factory(),
			'purchase_id' => Purchase::factory(),

			'score' => $this->faker->numberBetween(1, 10),
			'date' => $this->faker->date(),
			'decant_duration' => null,
			'notes' => $this->faker->paragraph(),
		];
	}

	/**
	 * @mago-ignore lint:prefer-static-closure
	 */
	public function setPurchase(Purchase $purchase): self {
		return $this->state(
			static fn (array $attributes) => [
				'purchase_id' => $purchase,
			]
		);
	}

	/**
	 * @mago-ignore lint:prefer-static-closure
	 */
	public function setBottle(Bottle $bottle): self {
		return $this->state(
			static fn (array $attributes) => [
				'bottle_id' => $bottle,
			]
		);
	}

	/**
	 * @mago-ignore lint:prefer-static-closure
	 */
	public function setUser(User $user): self {
		return $this->state(
			static fn (array $attributes) => [
				'user_id' => $user,
			]
		);
	}
}
