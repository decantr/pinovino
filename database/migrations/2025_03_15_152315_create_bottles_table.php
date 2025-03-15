<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	/**
	 * Run the migrations.
	 */
	public function up(): void
	{
		Schema::create('bottles', function (Blueprint $table) {
			$table->id();

			$table->string('name');
			$table->integer('vintage');
			$table->string('wine_type');
			$table->string('country');
			$table->string('region');

			$table->text('description');

			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('bottles');
	}
};
