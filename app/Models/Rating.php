<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Rating extends Model
{
	use HasFactory;

	protected $fillable = [
		'user_id',
		'bottle_id',
		'purchase_id',
		'rating',
		'date',
		'decant_duration',
		'notes',
	];

	protected $casts = [
		'rating' => 'integer',
		'decant_duration' => 'integer',
		'date' => 'datetime',
	];

	public function user(): BelongsTo
	{
		return $this->belongsTo(User::class);
	}

	public function bottle(): BelongsTo
	{
		return $this->belongsTo(Bottle::class);
	}

	public function purchase(): BelongsTo
	{
		return $this->belongsTo(Purchase::class);
	}
}
