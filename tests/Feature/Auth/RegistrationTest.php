<?php

use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Event;

test('registration screen can be rendered', function () {
	$response = $this->get(route('register'));

	$response->assertOk();
});

test('new users can register', function () {
	Event::fake();
	$referral = \App\Models\ReferralCode::factory()->create();

	$response = $this->post(route('register.store'), [
		'name' => 'John Doe',
		'email' => 'test@example.com',
		'password' => 'password',
		'password_confirmation' => 'password',
		'referral_code' => $referral->code,
	]);

	$response->assertSessionHasNoErrors()
		->assertRedirect(route('dashboard', absolute: false));

	$this->assertAuthenticated();
	Event::assertDispatched(Registered::class);
});

test('new users cannot register with an old referral', function () {
	$referral = \App\Models\ReferralCode::factory()->create();
	$referral->delete();

	$response = $this->post(route('register.store'), [
		'name' => 'John Doe',
		'email' => 'test@example.com',
		'password' => 'password',
		'password_confirmation' => 'password',
	]);

	$response
		->assertSessionHasErrors([
			'referral_code',
		]);

	$this->assertGuest();
});

test('gets referral code from url', function () {
	$referral = \App\Models\ReferralCode::factory()
		->set('code', '__test-referral-code-foo')
		->create();

	$response = $this->get(route('register'));
	$response->assertDontSee($referral->code);

	$response = $this->get(route('register', [
		'rf' => $referral->code,
	]));
	$response->assertSee($referral->code);
});
