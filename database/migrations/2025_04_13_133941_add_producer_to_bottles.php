<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	public function up(): void {
		Schema::table('bottles', function (Blueprint $table) {
			$table->string('producer')->after('wine_type')->nullable();
		});
	}

	public function down(): void {
		Schema::table('bottles', function (Blueprint $table) {
			$table->dropColumn('producer');
		});
	}
};
