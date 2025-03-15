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

	public function update(User $user, Bottle $bottle): bool {
		return $user->hasVerifiedEmail();
	}

	public function delete(User $user, Bottle $bottle): bool {
		return false;
	}

	public function restore(User $user, Bottle $bottle): bool {
		return false;
	}

	public function forceDelete(User $user, Bottle $bottle): bool {
		return false;
	}
}
