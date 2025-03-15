<?php

namespace App\Traits;

/**
 * @property string $sortBy
 * @property string $sortDirection
 */
trait WithSorting
{
	public function sort(string $field): void
	{
		if ($this->sortBy === $field) {
			$this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
		} else {
			$this->sortDirection = 'asc';
		}

		$this->sortBy = $field;
	}
}
