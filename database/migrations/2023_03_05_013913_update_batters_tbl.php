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
        Schema::table('batters', function (Blueprint $table) {
            $table->foreign('name')->references('name')->on('roster');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('batters', function (Blueprint $table) {
            //remove foreign
            $table->dropForeign('batters_name_foreign');
        });
    }
};
