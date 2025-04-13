<?php

namespace App\Livewire\Rating;

use App\Livewire\Forms\RatingForm;
use App\Models\Bottle;
use App\Models\Purchase;
use App\Models\Rating;
use App\Models\User;
use Flux\Flux;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;

class AddUpdate extends Component
{
	public RatingForm $form;

	public function render() {
		return view('livewire.rating.add-update');
	}

	#[On('create-rating')]
	public function create($bottle = null, $purchase = null) {
		$this->form->reset();
		$this->form->user_id = \auth()->id();

		$this->form->fill([
			'bottle_id' => $bottle,
			'purchase_id' => $purchase,
		]);

		Flux::modal('modal-rating-form')->show();
	}

	#[On('edit-rating')]
	public function edit(Rating $rating) {
		$this->form->set($rating);

		Flux::modal('modal-rating-form')->show();
	}

	public function save() {
		$this->form->save();

		if ($this->form->rating) {
			Flux::toast('Rating updated!', variant: 'success');
		} else {
			Flux::toast('Rating saved!', variant: 'success');
		}

		$this->form->reset();
		Flux::modal('modal-rating-form')->close();
		$this->dispatch('refresh-rating-table');
		$this->dispatch('refresh-rating-list');
		$this->dispatch('rating-created');
	}

	#[Computed]
	public function users() {
		return User::query()
			->orderBy('name')
			->get(['id', 'name']);
	}

	#[Computed]
	public function bottles() {
		return Bottle::query()
			->orderBy('name')
			->get(['id', 'name', 'vintage', 'wine_type']);
	}

	#[Computed]
	public function bottle(): ?Bottle {
		return Bottle::find($this->form->bottle_id);
	}

	#[Computed]
	#[On('refresh-purchase-list')]
	public function purchases() {
		return Purchase::query()
			->where('user_id', \auth()->id())
			->when(
				$this->form->bottle_id,
				fn (Builder $q) => $q->where('bottle_id', $this->form->bottle_id)
			)
			->orderByDesc('date')
			->get();
	}
}
