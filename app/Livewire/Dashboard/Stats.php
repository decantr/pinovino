<?php

namespace App\Livewire\Dashboard;

use App\Models\Purchase;
use App\Models\Rating;
use Livewire\Component;

class Stats extends Component
{
	public function render() {
		return view('livewire.dashboard.stats', [
			'bottles' => $this->getBottleCount(),
			'purchases' => $this->getPurchaseCount(),
			'ratings' => $this->getRatingCount(),
		]);
	}

	public function placeholder() {
		return view('livewire.dashboard.stats', [
			'bottles' => 0,
			'purchases' => 0,
			'ratings' => 0,
		]);
	}

	public function getBottleCount(): int {
		return Purchase::query()
			->where('user_id', \auth()->id())
			->count('bottle_id');
	}

	public function getPurchaseCount(): int {
		return Purchase::query()
			->where('user_id', \auth()->id())
			->count();
	}

	public function getRatingCount(): int {
		return Rating::query()
			->where('user_id', \auth()->id())
			->count();
	}
}
