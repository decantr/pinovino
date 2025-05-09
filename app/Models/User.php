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

class User extends Authenticatable
{
	/** @use HasFactory<\Database\Factories\UserFactory> */
	use HasFactory;

	use Notifiable;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var list<string>
	 */
	protected $fillable = ['name', 'email', 'password', 'role', 'referral_code_id'];

	/**
	 * The attributes that should be hidden for serialization.
	 *
	 * @var list<string>
	 */
	protected $hidden = ['password', 'remember_token'];

	protected $casts = [
		'role' => UserRole::class,
	];

	/**
	 * Get the user's initials
	 */
	public function initials(): string {
		return Str::of($this->name)
			->explode(' ')
			->map(fn (string $name) => Str::of($name)->substr(0, 1))
			->implode('');
	}

	public function referralCode(): HasOne {
		return $this->hasMany(ReferralCode::class)->latest()->one();
	}

	public function referralCodes(): HasMany {
		return $this->hasMany(ReferralCode::class);
	}

	/**
	 * Get the attributes that should be cast.
	 *
	 * @return array<string, string>
	 */
	protected function casts(): array {
		return [
			'email_verified_at' => 'datetime',
			'password' => 'hashed',
		];
	}
}
