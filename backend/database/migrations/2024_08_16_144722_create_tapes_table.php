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
        Schema::create('tapes', function (Blueprint $table) {
            $table->id();
            $table->string('title', 200);
            $table->string('artist', 200);
            $table->text('description')->nullable();
            $table->decimal('price', 8, 2);
            $table->unsignedInteger('stock')->default(0);
            $table->string('url')->nullable();
            $table->string('genre', 150)->nullable();
            $table->year('released')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tapes');
    }
};
