<?php

use App\Models\Bottle;
use Illuminate\Database\Eloquent\Builder;

class BottleService
{
	public static function getQuery(): Builder
	{
		return Bottle::query();
	}
}
