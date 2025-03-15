<?php

namespace App\Models;

use App\Enums\WineType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Bottle extends Model
{
	/** @use HasFactory<\Database\Factories\BottleFactory> */
	use HasFactory;

	protected $fillable = [
		'name',
		'vintage',
		'wine_type',
		'country',
		'region',
		'description',
	];

	protected $casts = [
		'wine_type' => WineType::class,
	];

	public function grapes(): BelongsToMany {
		return $this->belongsToMany(Grape::class);
	}

	public function purchases(): HasMany {
		return $this->hasMany(Purchase::class);
	}

	public function ratings(): HasMany {
		return $this->hasMany(Rating::class);
	}
}
