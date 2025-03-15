<?php

use App\Models\Grape;
use App\Models\Bottle;
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
		Schema::create('grapes', function (Blueprint $table) {
			$table->id();

			$table->string('name');

			$table->timestamps();
		});

		Schema::create('bottle_grape', function (Blueprint $table) {
			$table->foreignIdFor(Bottle::class);
			$table->foreignIdFor(Grape::class);

			$table->primary(['bottle_id', 'grape_id']);
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('bottle_grape');
		Schema::dropIfExists('grapes');
	}
};
