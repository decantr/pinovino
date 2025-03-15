<?php

use App\Models\Bottle;
use App\Models\Grape;
use App\Models\Purchase;
use App\Models\Rating;

test('can create bottles', function () {
	Bottle::factory()->create();
	expect(Bottle::count())->toBe(1);
});

test('can create grape', function () {
	Grape::factory()->create();
	expect(Grape::count())->toBe(1);
});

test('can create purchase', function () {
	Purchase::factory()->create();
	expect(Purchase::count())->toBe(1);
});

test('can create rating', function () {
	Rating::factory()->create();
	expect(Rating::count())->toBe(1);
});
