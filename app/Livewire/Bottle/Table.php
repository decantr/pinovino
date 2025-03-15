<?php

namespace App\Livewire\Bottle;

use App\Models\Bottle;
use App\Traits\WithFilters;
use App\Traits\WithSorting;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

#[On('refresh-table')]
class Table extends Component
{
	use WithFilters;
	use WithPagination;
	use WithSorting;

	// meta
	public $perPage = 15;

	// filters
	public $search;

	public BottleFilter $filters;

	// sorting
	public $sortBy = 'name';

	public $sortDirection = 'asc';

	public function render() {
		$years = Bottle::groupBy('vintage')->orderByDesc('vintage')->pluck('vintage');

		return view('livewire.bottle.table', [
			'rows' => $this->query()->paginate($this->perPage),
			'years' => $years,
		]);
	}

	protected function query(): Builder {
		$query = Bottle::query()
			->orderBy($this->sortBy, $this->sortDirection)
			->search('name', $this->search);

		$query = $this->filters->applyVintage($query);

		return $this->filters->applyWineType($query);
	}
}
