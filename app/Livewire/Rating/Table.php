<?php

namespace App\Livewire\Rating;

use App\Livewire\Bottle\BottleFilter;
use App\Livewire\Forms\RatingFilter;
use App\Models\Bottle;
use App\Models\Rating;
use App\Traits\WithFilters;
use App\Traits\WithSorting;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

#[On('refresh-rating-table')]
class Table extends Component
{
	use WithFilters;
	use WithPagination;
	use WithSorting;

	// meta
	public $perPage = 15;

	public $apply = [];

	// filters
	public $search;

	public RatingFilter $filters;

	// sorting
	public $sortBy = 'name';

	public $sortDirection = 'asc';

	public function render() {
		return view('livewire.rating.table', [
			'rows' => $this->query()->paginate($this->perPage),
		]);
	}

	protected function query(): Builder {
		$query = Rating::query()
			->join(
				'bottles',
				'bottles.id',
				'bottle_id',
			)
			->with([
				'bottle',
				'user',
			])
			->orderBy($this->sortBy, $this->sortDirection)
			->search('name', $this->search);

		if (! empty($this->apply)) {
			$query->apply($this->filters, $this->apply);
		}

		return $query;
	}
}
