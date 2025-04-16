<?php

use App\Livewire\Auth\Register;
use Livewire\Livewire;

uses(\Illuminate\Foundation\Testing\RefreshDatabase::class);

test('registration screen can be rendered', function () {
	$response = $this->get('/register');

	$response->assertStatus(200);
});

test('new users cannot register without referral', function () {
	$response = Livewire::test(Register::class)
		->set('name', 'Test User')
		->set('email', 'test@example.com')
		->set('password', 'password')
		->set('password_confirmation', 'password')
		->call('register');

	$response->assertHasErrors([
		'referral_code',
	]);

	$this->assertGuest();
});

test('new users can register', function () {
	$referral = \App\Models\ReferralCode::factory()->create();

	$response = Livewire::test(Register::class)
		->set('name', 'Test User')
		->set('email', 'test@example.com')
		->set('password', 'password')
		->set('password_confirmation', 'password')
		->set('referral_code', $referral->code)
		->call('register');

	$response
		->assertHasNoErrors()
		->assertRedirect(route('dashboard', absolute: false));

	$this->assertAuthenticated();
});

test('new users cannot register with an old referral', function () {
	$referral = \App\Models\ReferralCode::factory()->create();
	$referral->delete();

	$response = Livewire::test(Register::class)
		->set('name', 'Test User')
		->set('email', 'test@example.com')
		->set('password', 'password')
		->set('password_confirmation', 'password')
		->call('register');

	$response->assertHasErrors([
		'referral_code',
	]);

	$this->assertGuest();
});
