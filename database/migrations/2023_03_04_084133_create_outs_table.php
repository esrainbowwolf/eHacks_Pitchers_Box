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
        Schema::create('outs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pid')->constrained('pitchers');
            $table->string('type');
            // 0 = homeBase, 1 = firstBase, 2 = secondBase, 3 = thirdBase
            $table->boolean('0');
            $table->boolean('1');
            $table->boolean('2');
            $table->boolean('3');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('outs');
    }
};
