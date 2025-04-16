<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

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
