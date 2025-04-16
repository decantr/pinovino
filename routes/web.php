<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
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

	// from starter kit ========================================================
	Route::redirect('settings', 'settings/profile');

	Route::get('settings/profile', Profile::class)->name('settings.profile');
	Route::get('settings/password', Password::class)->name('settings.password');
	Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

require __DIR__.'/auth.php';
