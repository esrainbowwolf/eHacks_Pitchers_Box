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
        Schema::create('pitchers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            // foreign string name to name on roster table
            $table->foreign('name')->references('name')->on('roster');
            $table->string('hand', 1);
            $table->integer('jersey');
            $table->foreignId('gid')->constrained('games');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pitchers');
    }
};
