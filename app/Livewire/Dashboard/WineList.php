<?php

namespace App\Livewire\Dashboard;

use App\Models\Bottle;
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

	public function query(): Builder
	{
		return Bottle::query()
			->whereHas(
				'purchases',
				fn(Builder|HasMany $q) => $q->where('user_id', \auth()->id())
			);
	}
}
