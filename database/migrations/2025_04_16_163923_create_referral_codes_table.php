<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	public function up(): void {
		Schema::create('referral_codes', function (Blueprint $table) {
			$table->id();

			$table->string('code');

			$table->foreignIdFor(\App\Models\User::class)
				->constrained();

			$table->softDeletes();
			$table->timestamps();
		});

		Schema::table('users', function (Blueprint $table) {
			$table->foreignId('referral_code_id')
				->nullable()
				->after('id')
				->constrained();
		});
	}

	public function down(): void {
		Schema::dropIfExists('referral_codes');
	}
};
