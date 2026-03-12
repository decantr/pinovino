<?php

namespace App\Policies;

use App\Enums\UserRole;
use App\Models\Purchase;
use App\Models\User;

class PurchasePolicy
{
	public function viewAny(User $user): bool {
		if ($user->role?->gte(UserRole::Admin)) {
			return true;
		}

		return false;
	}

	public function view(User $user, Purchase $purchase): bool {
		if ($user->role?->gte(UserRole::Admin)) {
			return true;
		}

		return $purchase->user_id === $user->id;
	}

	public function create(User $user): bool {
		return $user->role?->gte(UserRole::User);
	}

	public function update(User $user, Purchase $purchase): bool {
		if ($user->role?->gte(UserRole::Admin)) {
			return true;
		}

		return $purchase->user_id === $user->id;
	}

	public function delete(User $user, Purchase $purchase): bool {
		if ($user->role?->gte(UserRole::Admin)) {
			return true;
		}

		return $purchase->user_id === $user->id;
	}

	public function restore(User $user, Purchase $purchase): bool {
		if ($user->role?->gte(UserRole::Admin)) {
			return true;
		}

		return $purchase->user_id === $user->id;
	}

	public function forceDelete(User $user, Purchase $purchase): bool {
		return false;
	}
}
