<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property string $name
 */
class Grape extends Model
{
	use HasFactory;

	/** @use HasFactory<\Database\Factories\GrapeFactory> */
	protected $fillable = [
		'name',
	];

	public function bottles(): BelongsToMany {
		return $this->belongsToMany(Bottle::class);
	}
}
