<?php

namespace App\Livewire\Dashboard;

use App\Models\Bottle;
use Flux\Flux;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Livewire\Component;
use Livewire\WithPagination;

class WineList extends Component
{
	use WithPagination;

	public function render()
	{
		return view('livewire.dashboard.wine-list', [
			'rows' => $this->query()->paginate(),
		]);
	}

	protected function query(): Builder
	{
		return Bottle::query()
			// ->whereHas(
			// 	'purchases',
			// 	fn(Builder|HasMany $q) => $q->where('user_id', \auth()->id())
			// )
		;
	}

	public function addNew()
	{
		Flux::toast('Coming soon');
	}
}
