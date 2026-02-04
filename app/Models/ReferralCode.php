<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property string $code
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 */
class ReferralCode extends Model
{
	/** @use HasFactory<\Database\Factories\ReferralCodeFactory> */
	use HasFactory;

	use SoftDeletes;

	public function user(): BelongsTo {
		return $this->belongsTo(User::class);
	}

	public function users(): HasMany {
		return $this->hasMany(User::class);
	}
}
