<?php

namespace App\Policies;

use App\Enums\UserRole;
use App\Models\Rating;
use App\Models\User;

class RatingPolicy
{
	public function viewAny(User $user): bool {
		return true;
	}

	public function view(User $user, Rating $rating): bool {
		if ($user->role?->gt(UserRole::Admin)) {
			return true;
		}

		return $rating->user_id === $user->id;
	}

	public function create(User $user): bool {
		return $user->role?->gt(UserRole::User);
	}

	public function update(User $user, Rating $rating): bool {
		if ($user->role?->gt(UserRole::Admin)) {
			return true;
		}

		return $rating->user_id === $user->id;
	}

	public function delete(User $user, Rating $rating): bool {
		if ($user->role?->gt(UserRole::Admin)) {
			return true;
		}

		return $rating->user_id === $user->id;
	}

	public function restore(User $user, Rating $rating): bool {
		if ($user->role?->gt(UserRole::Admin)) {
			return true;
		}

		return $rating->user_id === $user->id;
	}

	public function forceDelete(User $user, Rating $rating): bool {
		return false;
	}
}
