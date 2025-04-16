<?php

namespace App\Policies;

use App\Enums\UserRole;
use App\Models\User;

class UserPolicy
{
	public function viewAny(User $user): bool {
		return false;
	}

	public function invite(User $user): bool {
		return true;
	}

	public function view(User $user, User $model): bool {
		return $user->is($model);
	}

	public function create(User $user): bool {
		return $user->role === UserRole::Admin;
	}

	public function update(User $user, User $model): bool {
		if ($user->role === UserRole::Admin) {
			return true;
		}

		return $user->is($model);
	}

	public function delete(User $user, User $model): bool {
		if ($user->role === UserRole::Admin) {
			return true;
		}

		return $user->is($model);
	}

	public function restore(User $user, User $model): bool {
		return false;
	}

	public function forceDelete(User $user, User $model): bool {
		return false;
	}
}
