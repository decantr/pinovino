<?php

namespace App\Livewire\Bottle;

use App\Models\Bottle;
use App\Traits\WithFilters;
use App\Traits\WithSorting;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{
	use WithSorting;
	use WithFilters;
	use WithPagination;

	// meta
	public $perPage = 15;

	// filters
	public $search;
	public BottleFilter $filters;

	// sorting
	public $sortBy = 'name';
	public $sortDirection = 'asc';

	public function render()
	{
		$years = Bottle::groupBy('vintage')->orderByDesc('vintage')->pluck('vintage');

		return view('livewire.bottle.table', [
			'rows' => $this->query()->paginate($this->perPage),
			'years' => $years,
		]);
	}

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
