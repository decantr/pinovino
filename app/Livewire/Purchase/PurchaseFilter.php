<?php

namespace App\Livewire\Purchase;

use Flux\DateRange;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Form;

class PurchaseFilter extends Form
{
	public ?DateRange $range;

	public function applyRange(Builder $query): Builder {
		if (empty($this->range)) {
			return $query;
		}

		return $query->whereBetween('date', $this->range);
	}
}
