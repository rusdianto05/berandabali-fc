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
        Schema::table('teams', function (Blueprint $table) {
            $table->integer('goal')->default(0);
            $table->integer('assist')->default(0);
            $table->integer('apperances')->default(0);
            $table->integer('clean_sheet')->default(0);
            $table->integer('saves')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('teams', function (Blueprint $table) {
            $table->dropColumn('goal');
            $table->dropColumn('assist');
            $table->dropColumn('apperances');
            $table->dropColumn('clean_sheet');
            $table->dropColumn('saves');
        });
    }
};
