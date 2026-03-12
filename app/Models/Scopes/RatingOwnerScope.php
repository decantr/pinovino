<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class RatingOwnerScope implements Scope
{
	/**
	 * Apply the scope to a given Eloquent query builder.
	 */
	public function apply(Builder $builder, Model $model): void {
		$builder->where(
			fn (Builder $q) => $q
				->where('user_id', \auth()->id())
				->orWhere('is_public', true)
		);
	}
}
