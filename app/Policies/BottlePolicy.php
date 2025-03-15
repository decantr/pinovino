<?php

namespace App\Policies;

use App\Models\Bottle;
use App\Models\User;

class BottlePolicy
{
	public function viewAny(User $user): bool {
		return true;
	}

	public function view(User $user, Bottle $bottle): bool {
		return $user->hasVerifiedEmail();
	}

	public function create(User $user): bool {
		return $user->hasVerifiedEmail();
	}

	/**
	 * Determine whether the user can update the model.
	 */
	public function update(User $user, Bottle $bottle): bool {
		return $user->hasVerifiedEmail();
	}

	/**
	 * Determine whether the user can delete the model.
	 */
	public function delete(User $user, Bottle $bottle): bool {
		return false;
	}

	/**
	 * Determine whether the user can restore the model.
	 */
	public function restore(User $user, Bottle $bottle): bool {
		return false;
	}

	/**
	 * Determine whether the user can permanently delete the model.
	 */
	public function forceDelete(User $user, Bottle $bottle): bool {
		return false;
	}
}
