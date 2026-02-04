<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $user_id
 * @property int $bottle_id
 * @property int|null $purchase_id
 * @property int $score
 * @property \Illuminate\Support\Carbon $date
 * @property int|null $decant_duration
 * @property string|null $notes
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 */
class Rating extends Model
{
	use HasFactory;

	protected $fillable = [
		'user_id',
		'bottle_id',
		'purchase_id',
		'score',
		'date',
		'decant_duration',
		'notes',
	];

	protected $casts = [
		'score' => 'integer',
		'decant_duration' => 'integer',
		'date' => 'datetime',
	];

	public function user(): BelongsTo {
		return $this->belongsTo(User::class);
	}

	public function bottle(): BelongsTo {
		return $this->belongsTo(Bottle::class);
	}

	public function purchase(): BelongsTo {
		return $this->belongsTo(Purchase::class);
	}
}
