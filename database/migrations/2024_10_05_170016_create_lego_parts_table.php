<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('lego_parts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('set_id')->unique();
            $table->string('part_number');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lego_parts');
    }
};
