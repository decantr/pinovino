<?php

namespace App\Livewire\Purchase;

use App\Livewire\Forms\PurchaseForm;
use App\Models\Bottle;
use App\Models\Purchase;
use App\Models\User;
use Flux\Flux;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;

class AddUpdate extends Component {
	public ?Bottle $bottle = null;

	public PurchaseForm $form;

	public function render() {
		return view('livewire.purchase.add-update');
	}

	#[On('create-purchase')]
	public function create($bottle = null) {
		$this->form->reset();
		$this->form->bottle_id = $bottle ?? $this->bottle ?? null;

		Flux::modal('modal-purchase-form')->show();
	}

	#[On('edit-purchase')]
	public function edit(Purchase $purchase) {
		$this->form->set($purchase);
		Flux::modal('modal-purchase-form')->show();
	}

	public function save() {
		$this->form->save();

		if ($this->form->purchase) {
			Flux::toast('Purchase updated!', variant: 'success');
		} else {
			Flux::toast('Purchase saved!', variant: 'success');
		}

		$this->form->reset();
		Flux::modal('modal-purchase-form')->close();
		$this->dispatch('refresh-purchase-table');
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
