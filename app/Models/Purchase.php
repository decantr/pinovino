<?php

namespace App\Models;

use App\Casts\MoneyCast;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Purchase extends Model
{
	/** @use HasFactory<\Database\Factories\PurchaseFactory> */
	use HasFactory;

	protected $fillable = [
		'user_id',
		'bottle_id',
		'date',
		'cost',
		'store',
		'notes',
	];

	protected $casts = [
		'date' => 'datetime',
		'cost' => MoneyCast::class,
	];

	public function user(): BelongsTo {
		return $this->belongsTo(User::class);
	}

	public function bottle(): BelongsTo {
		return $this->belongsTo(Bottle::class);
	}

	public function ratings(): HasMany {
		return $this->hasMany(Rating::class);
	}
}
