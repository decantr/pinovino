<?php

namespace App\Models;

use App\Enums\WineType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Bottle extends Model
{
	protected $fillable = [
		'name',
		'vintage',
		'type',
		'country',
		'region',
	];

	protected $casts = [
		'wine_type' => WineType::class,
	];

	public function grapes(): BelongsToMany
	{
		return $this->belongsToMany(Grape::class);
	}
}
