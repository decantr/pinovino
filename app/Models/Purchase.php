<?php

namespace App\Models;

use App\Casts\MoneyCast;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Purchase extends Model
{
	protected $fillable = [
		'bottle_id',
		'date',
		'cost',
		'store',
	];

	protected $casts = [
		'date' => 'datetime',
		'cost' => MoneyCast::class,
	];

	public function bottle(): BelongsTo
	{
		return $this->belongsTo(Bottle::class);
	}

	public function ratings(): HasMany
	{
		return $this->hasMany(Rating::class);
	}
}
