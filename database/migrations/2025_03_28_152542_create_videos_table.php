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
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->string(column: 'title');
            $table->text(column: 'description')->nullable();
            $table->string(column: 'image')->nullable();
            $table->integer(column: 'year');
            $table->integer(column: 'price');
            $table->boolean(column: 'is_published')->default(value: true);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('videos');
    }
};
