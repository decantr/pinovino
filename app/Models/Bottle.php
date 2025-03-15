<?php

namespace App\Models;

use App\Enums\WineType;
use Illuminate\Database\Eloquent\Model;

class Bottle extends Model
{
	protected $fillable = [
		'name',
		'vintage',
		'type',
		'country',
		'region',
	];

	protected $casts = [
		'wine_type' => WineType::class,
	];
}
