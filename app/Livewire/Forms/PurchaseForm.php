<?php

namespace App\Livewire\Forms;

use App\Models\Purchase;
use Livewire\Attributes\Validate;
use Livewire\Form;

class PurchaseForm extends Form
{
	public ?Purchase $purchase = null;

	#[Validate(['nullable', 'exists:users,id'])]
	public $user_id;

	#[Validate(['required', 'exists:bottles,id'])]
	public $bottle_id;

	#[Validate(['required', 'date'])]
	public $date;

	#[Validate(['required', 'numeric', 'min:0'])]
	public $cost;

	#[Validate(['nullable', 'string'])]
	public $store;

	#[Validate(['nullable', 'string'])]
	public $notes;

	public function set(Purchase $purchase): void {
		$this->purchase = $purchase;
		$this->fill($purchase->toArray());
	}

	public function save(): void {
		$this->validate();

		if ($this->purchase) {
			$this->purchase->update($this->toArray());
		} else {
			$this->user_id ??= \auth()->id();

			Purchase::create($this->toArray());
		}
	}
}
