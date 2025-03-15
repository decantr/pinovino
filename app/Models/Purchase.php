<?php

namespace App\Models;

use App\Casts\MoneyCast;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
}
