<?php

namespace App\Livewire\Forms;

use App\Models\Rating;
use Livewire\Attributes\Validate;
use Livewire\Form;

class RatingForm extends Form
{
	public ?Rating $rating = null;

	#[Validate(['required', 'exists:users,id'])]
	public $user_id;

	#[Validate(['required', 'exists:bottles,id'])]
	public $bottle_id;

	#[Validate(['required', 'exists:purchases,id'])]
	public $purchase_id;

	#[Validate(['required', 'numeric', 'min:1', 'max:10'])]
	public $score;

	#[Validate(['required', 'date'])]
	public $date;

	#[Validate(['sometimes', 'nullable', 'numeric'])]
	public $decant_duration;

	#[Validate(['nullable', 'string'])]
	public $notes;

	public function set(Rating $rating): void {
		$this->rating = $rating;
		$this->fill($rating->toArray());
	}

	public function save(): Rating {
		$validated = $this->validate();

		if ($this->rating) {
			$this->rating->update($validated);
			$rating = $this->rating;
		} else {
			$rating = Rating::create($validated);
		}

		return $rating;
	}
}
