<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	public function up(): void {
		Schema::table('bottles', function (Blueprint $table) {
			$table->integer('size')
				->default(\App\Enums\BottleSize::Standard)
				->nullable();
		});
	}

	public function down(): void {
		Schema::table('bottles', function (Blueprint $table) {
			$table->dropColumn([
				'size',
			]);
		});
	}
};
