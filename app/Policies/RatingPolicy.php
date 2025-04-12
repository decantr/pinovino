<?php

namespace App\Policies;

use App\Models\Rating;
use App\Models\User;

class RatingPolicy
{
	public function viewAny(User $user): bool {
		return $user->hasVerifiedEmail();
	}

	public function view(User $user, Rating $rating): bool {
		if ($user->is_admin) {
			return true;
		}

		return $rating->user_id === $user->id;
	}

	public function create(User $user): bool {
		return $user->hasVerifiedEmail();
	}

	public function update(User $user, Rating $rating): bool {
		if ($user->is_admin) {
			return true;
		}

		return $rating->user_id === $user->id;
	}

	public function delete(User $user, Rating $rating): bool {
		return $rating->user_id === $user->id;
	}

	public function restore(User $user, Rating $rating): bool {
		return false;
	}

	public function forceDelete(User $user, Rating $rating): bool {
		return false;
	}
}
