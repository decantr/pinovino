<?php

namespace App\Livewire\User;

use App\Models\ReferralCode;
use Livewire\Component;
use Livewire\WithPagination;

class Invite extends Component
{
	use WithPagination;

	public function render() {
		return view('livewire.user.invite', [
			'value' => \auth()->user()->referralCode?->code,
			'total' => $this->total(),
			'rows' => $this->query()->paginate(),
		]);
	}

	public function newCode() {
		$user = \auth()->user();

		$user->referralCode?->delete();

		ReferralCode::factory(state: [
			'user_id' => $user->id,
		])
			->create();

		$user->load('referralCode');
	}

	private function total(): int {
		return \auth()->user()->referralCode?->users()->count() ?? 0;
	}

	private function query() {
		return ReferralCode::query()
			->where('user_id', \auth()->id())
			->whereNot('id', \auth()->user()->referralCode?->id)
			->withCount([
				'users',
			])
			->withTrashed()
			->latest('created_at');
	}
}
