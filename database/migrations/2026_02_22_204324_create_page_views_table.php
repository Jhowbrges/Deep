<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	public function up(): void
	{
		Schema::create('page_views', function (Blueprint $table) {
			$table->id();

			$table->foreignId('user_id')->nullable()->index();
			$table->string('route_name')->nullable()->index();
			$table->string('path', 255)->index();
			$table->string('method', 10)->nullable();
			$table->string('ip', 45)->nullable();
			$table->string('user_agent', 255)->nullable();

			$table->timestamps();
		});
	}

	public function down(): void
	{
		Schema::dropIfExists('page_views');
	}
};

