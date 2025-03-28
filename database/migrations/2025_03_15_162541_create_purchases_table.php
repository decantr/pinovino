<?php

use App\Models\Bottle;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	/**
	 * Run the migrations.
	 */
	public function up(): void {
		Schema::create('purchases', function (Blueprint $table) {
			$table->id();

			$table->foreignIdFor(User::class)->constrained();
			$table->foreignIdFor(Bottle::class)->constrained();

			$table->dateTimeTz('date');
			$table->integer('cost');

			$table->string('store')->nullable();

			$table->text('notes')->nullable();

			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void {
		Schema::dropIfExists('purchases');
	}
};
