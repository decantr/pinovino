<?php

namespace App\Livewire\Dashboard;

use App\Livewire\Bottle\BottleFilter;
use App\Models\Bottle;
use App\Traits\WithFilters;
use App\Traits\WithSorting;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;

class CurrentTable extends Component
{
	use WithFilters;
	use WithPagination;
	use WithSorting;

	// meta
	public $perPage = 15;

	public $apply = [];

	// filters
	public $search;

	public BottleFilter $filters;

	// sorting
	public $sortBy = 'name';

	public $sortDirection = 'asc';

	public function render() {
		return view('livewire.dashboard.current-table', [
			'rows' => $this->query()->paginate($this->perPage),
		]);
	}

	protected function query(): Builder {
		$query = Bottle::query()
			->apply($this->filters, [
				'applyOwner',
				'applyVintage',
				'applyWineType',
				'applyNoRating',
			])
			->with([
				'purchases' => fn (Builder $query) => $query->where('user_id', auth()->id()),
				'rating' => fn (Builder $q) => $q->where('user_id', auth()->id())
			])
			->orderBy($this->sortBy, $this->sortDirection)
			->search('name', $this->search);

		return $query;
	}
}
