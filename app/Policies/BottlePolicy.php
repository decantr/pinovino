<?php

namespace App\Policies;

use App\Enums\UserRole;
use App\Models\Bottle;
use App\Models\User;

class BottlePolicy
{
	public function viewAny(User $user): bool {
		return true;
	}

	public function view(User $user, Bottle $bottle): bool {
		return true;
	}

	public function create(User $user): bool {
		return true;
	}

	public function update(User $user, Bottle $bottle): bool {
		return $user->role === UserRole::User;
	}

	public function delete(User $user, Bottle $bottle): bool {
		return $user->role === UserRole::Admin;
	}

	public function restore(User $user, Bottle $bottle): bool {
		return $user->role === UserRole::Admin;
	}

	public function forceDelete(User $user, Bottle $bottle): bool {
		return false;
	}
}
