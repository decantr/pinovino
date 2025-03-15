<?php

namespace App\Livewire\Bottle;

use App\Livewire\Forms\BottleForm;
use App\Models\Bottle;
use Flux\Flux;
use Livewire\Attributes\On;
use Livewire\Component;

class AddUpdate extends Component
{
	public BottleForm $form;

	public function render() {
		return view('livewire.bottle.add-update');
	}

	#[On('create-bottle')]
	public function create() {
		$this->form->reset();
		Flux::modal('modal-bottle-form')->show();
	}

	#[On('edit-bottle')]
	public function edit(Bottle $bottle) {
		$this->form->set($bottle);
		Flux::modal('modal-bottle-form')->show();
	}

	public function save() {
		$this->form->save();

		if ($this->form->bottle) {
			Flux::toast('Bottle updated!', variant: 'success');
		} else {
			Flux::toast('Bottle saved!', variant: 'success');
		}

		$this->form->reset();
		Flux::modal('modal-bottle-form')->close();
		$this->dispatch('refresh-bottle-table');
		$this->dispatch('refresh-bottle-list');
	}
}
