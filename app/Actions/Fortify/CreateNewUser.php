<?php

namespace App\Actions\Fortify;

use App\Concerns\PasswordValidationRules;
use App\Concerns\ProfileValidationRules;
use App\Models\ReferralCode;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
	use PasswordValidationRules, ProfileValidationRules;

	/**
	 * Validate and create a newly registered user.
	 *
	 * @param  array<string, string>  $input
	 */
	public function create(array $input): User
	{
		$validated = Validator::make($input, [
			...$this->profileRules(),
			'password' => $this->passwordRules(),
			'referral_code' => ['required', 'string', 'exists:referral_codes,code'],
		])->validate();

		$validated['referral_code_id'] = ReferralCode::query()
			->where('code', $validated['referral_code'])
			->firstOrFail()
			->id;

		$user = User::create($validated);

		return $user;
	}
}
