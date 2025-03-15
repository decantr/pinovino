<?php

namespace App\Livewire\Purchase;

use App\Models\Purchase;
use App\Traits\WithFilters;
use App\Traits\WithSorting;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

#[On('refresh-purchase-table')]
class Table extends Component
{
	use WithFilters;
	use WithPagination;
	use WithSorting;

	// meta
	public $perPage = 15;

	// filters
	public $search;

	public PurchaseFilter $filters;

	// sorting
	public $sortBy = 'date';

	public $sortDirection = 'desc';

	public function render() {
		return view('livewire.purchase.table', [
			'rows' => $this->query()->paginate($this->perPage),
		]);
	}

	protected function query(): Builder {
		$query = Purchase::query()
			->with([
				'user',
				'bottle',
			])
			->orderBy($this->sortBy, $this->sortDirection);

		return $this->filters->applyRange($query);
	}
}
