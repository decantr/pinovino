<?php

namespace App\Models;

use App\Enums\BottleSize;
use App\Enums\WineType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Bottle extends Model implements HasMedia
{
	/** @use HasFactory<\Database\Factories\BottleFactory> */
	use HasFactory;

	use InteractsWithMedia;

	protected $fillable = [
		'name',
		'vintage',
		'wine_type',
		'country',
		'region',
		'description',
		'producer',
		'size',
	];

	protected $casts = [
		'wine_type' => WineType::class,
		'size' => BottleSize::class,
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

	public function rating(): HasOne {
		return $this->ratings()->latest('date')->one();
	}

	public function avatar(): MorphOne {
		return $this->media()->one();
	}

	public function registerMediaConversions(?Media $media = null): void {
		$this
			->addMediaConversion('preview')
			->fit(Fit::Contain, 300, 300)
			->nonQueued();
	}
}
