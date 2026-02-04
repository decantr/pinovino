<?php

use Illuminate\Support\Facades\Route;

Route::get('/', fn () => redirect(route('dashboard')))->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
	Route::view('dashboard', 'dashboard')->name('dashboard');
	Route::get('invite', \App\Livewire\User\Invite::class)
		->can('invite', \App\Models\User::class)
		->name('invite');

	// bottle ==================================================================
	Route::get('bottles', \App\Livewire\Bottle\Page::class)
		->can('view-any', \App\Models\Bottle::class)
		->name('bottle.index');

	Route::get('/bottles/{bottle}', \App\Livewire\Bottle\Show::class)
		->can('view', 'bottle')
		->name('bottle.show');

	// purchase ================================================================
	Route::get('purchase', \App\Livewire\Purchase\Page::class)
		->can('view-any', \App\Models\Purchase::class)
		->name('purchase.index');

	// rating ==================================================================
	Route::get('rating', \App\Livewire\Rating\Page::class)
		->can('view-any', \App\Models\Rating::class)
		->name('rating.index');
});

require __DIR__.'/settings.php';
