<?php

namespace App\Livewire\Bottle;

use App\Models\Bottle;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Modelable;
use Livewire\Component;

class Filters extends Component
{
	#[Modelable]
	public BottleFilter $filters;

	public function render() {
		return view('livewire.bottle.filters', [
			'years' => $this->years(),
		]);
	}

	public function placeholder() {
		return view('livewire.bottle.filters-placeholder');
	}

	#[Computed]
	public function years() {
		return Bottle::query()
			->groupBy('vintage')
			->orderByDesc('vintage')
			->pluck('vintage');
	}
}
