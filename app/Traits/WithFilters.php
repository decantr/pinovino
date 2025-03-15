<?php

namespace App\Traits;

use Livewire\Attributes\On;

trait WithFilters
{
	public function updatedWithFilters($key, $value)
	{
		if ($key === 'search') {
			$this->resetPage();
		} else if (\str_starts_with('filters.', $key)) {
			$this->resetPage();
		}
	}

	#[On('clear-filters')]
	public function clearFilters()
	{
		$this->filters->reset();
	}

	#[On('reset-filter')]
	public function resetFilter(string $name)
	{
		$this->filters->reset($name);
	}
}
