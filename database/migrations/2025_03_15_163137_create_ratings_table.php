<?php

use App\Models\Bottle;
use App\Models\Purchase;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	public function up(): void {
		Schema::create('ratings', function (Blueprint $table) {
			$table->id();

			$table->foreignIdFor(User::class)->constrained();
			$table->foreignIdFor(Bottle::class)->constrained();
			$table->foreignIdFor(Purchase::class)->constrained();

			$table->integer('score');
			$table->dateTime('date');

			$table->integer('decant_duration')->nullable();
			$table->text('notes')->nullable();

			$table->timestamps();
		});
	}

	public function down(): void {
		Schema::dropIfExists('ratings');
	}
};
