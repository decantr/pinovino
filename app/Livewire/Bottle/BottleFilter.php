<?php

namespace App\Livewire\Bottle;

use Illuminate\Database\Eloquent\Builder;
use Livewire\Attributes\Validate;
use Livewire\Form;

class BottleFilter extends Form
{
	public $vintage = [];
	public $wine_type = [];

	public function applyVintage(Builder $query): Builder
	{
		if (empty($this->vintage)) {
			return $query;
		}

		return $query->whereIn('vintage', $this->vintage);
	}

	public function applyWineType(Builder $query): Builder
	{
		if (empty($this->wine_type)) {
			return $query;
		}

		return $query->whereIn('wine_type', $this->wine_type);
	}
}
