<?php

namespace App\Livewire\Bottle;

use App\Models\Bottle;
use App\Traits\WithFilters;
use App\Traits\WithSorting;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;

/** @package App\Livewire\Bottle */
class Page extends Component
{
	use WithSorting;
	use WithFilters;
	use WithPagination;

	// filters
	public $search;
	public BottleFilter $filters;

	// sorting
	public $sortBy = 'name';
	public $sortDirection = 'asc';

	public function mount() {}

	public function render()
	{
		$years = Bottle::groupBy('vintage')->orderByDesc('vintage')->pluck('vintage');

		return view('livewire.bottle.page', [
			'rows' => $this->query()->paginate(),
			'years' => $years,
		]);
	}

	// public function updated($key, $value)
	// {
	// 	if ($key === 'search') {
	// 		$this->resetPage();
	// 	} else if (\str_starts_with('filters.', $key)) {
	// 		$this->resetPage();
	// 	}
	// }

	protected function query(): Builder
	{
		$query = Bottle::query()
			->orderBy($this->sortBy, $this->sortDirection)
			->search('name', $this->search);

		$query = $this->filters->applyVintage($query);
		$query = $this->filters->applyWineType($query);

		return $query;
	}
}
