<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Enums\UserRole;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Laravel\Fortify\TwoFactorAuthenticatable;

/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property UserRole $role
 * @property int|null $referral_code_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 */
class User extends Authenticatable
{
	/** @use HasFactory<\Database\Factories\UserFactory> */
	use HasFactory;

	use Notifiable;
	use TwoFactorAuthenticatable;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var list<string>
	 */
	protected $fillable = [
		'name',
		'email',
		'password',
		'role',
		'referral_code_id',
	];

	/**
	 * The attributes that should be hidden for serialization.
	 *
	 * @var list<string>
	 */
	protected $hidden = [
		'password',
		'two_factor_secret',
		'two_factor_recovery_codes',
		'remember_token',
	];

	protected $casts = [
		'email_verified_at' => 'datetime',
		'password' => 'hashed',
		'role' => UserRole::class,
	];

	/**
	 * Get the user's initials
	 */
	public function initials(): string {
		return Str::of($this->name)
			->explode(' ')
			->take(2)
			->map(fn (string $name) => Str::of($name)->substr(0, 1))
			->implode('');
	}

	public function referralCode(): HasOne {
		return $this->hasMany(ReferralCode::class)->latest()->one();
	}

	public function referralCodes(): HasMany {
		return $this->hasMany(ReferralCode::class);
	}
}
