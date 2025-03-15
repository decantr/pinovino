<?php

namespace App\Policies;

use App\Models\Purchase;
use App\Models\User;

class PurchasePolicy
{
	public function viewAny(User $user): bool {
		return $user->hasVerifiedEmail();
	}

	public function view(User $user, Purchase $purchase): bool {
		if ($user->is_admin) {
			return true;
		}

		return $purchase->user_id === $user->id;
	}

	public function create(User $user): bool {
		return $user->hasVerifiedEmail();
	}

	public function update(User $user, Purchase $purchase): bool {
		if ($user->is_admin) {
			return true;
		}

		return $purchase->user_id === $user->id;
	}

	public function delete(User $user, Purchase $purchase): bool {
		return $purchase->user_id === $user->id;
	}

	public function restore(User $user, Purchase $purchase): bool {
		return false;
	}

	public function forceDelete(User $user, Purchase $purchase): bool {
		return false;
	}
}
