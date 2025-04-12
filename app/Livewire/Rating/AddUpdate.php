<?php

namespace App\Livewire\Rating;

use App\Livewire\Forms\RatingForm;
use App\Models\Bottle;
use App\Models\Rating;
use App\Models\User;
use Flux\Flux;
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
	public function create() {
		$this->form->reset();
		$this->form->user_id = \auth()->id();
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
	}

	#[Computed]
	public function users() {
		return User::query()
			->orderBy('name')
			->get(['id', 'name']);
	}

	#[Computed]
	#[On('refresh-bottle-list')]
	public function bottles() {
		return Bottle::query()
			->orderBy('name')
			->get(['id', 'name', 'vintage', 'wine_type']);
	}
}
