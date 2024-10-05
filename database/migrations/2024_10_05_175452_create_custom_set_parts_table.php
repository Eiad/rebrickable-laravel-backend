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
        Schema::create('custom_set_parts', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('custom_set_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('part_number');
            $table->integer('quantity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('custom_set_parts');
    }
};
