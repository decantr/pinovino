<?php

namespace App\Livewire\Bottle;

use App\Models\Bottle;
use Livewire\Component;

class Show extends Component
{
	public Bottle $bottle;

	public function render() {
		return view('livewire.bottle.show');
	}
}
