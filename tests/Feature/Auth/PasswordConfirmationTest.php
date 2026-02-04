<?php

use App\Models\User;

uses(\Illuminate\Foundation\Testing\RefreshDatabase::class);

test('confirm password screen can be rendered', function () {
	$user = User::factory()->create();

	$response = $this->actingAs($user)->get(route('password.confirm'));

	$response->assertOk();
});

test('password can be confirmed', function () {
	$user = User::factory()->create();

	$this->actingAs($user);

	$response = $this->post(route('password.confirm.store'), [
		'password' => 'password',
	]);

	$response
		->assertSessionHasNoErrors()
		->assertRedirect(route('dashboard', absolute: false));
});

test('password is not confirmed with invalid password', function () {
	$user = User::factory()->create();

	$this->actingAs($user);

	$response = $this->post(route('password.confirm.store'), [
		'password' => 'wrong-password',
	]);

	$response->assertSessionHasErrors(['password']);
});
