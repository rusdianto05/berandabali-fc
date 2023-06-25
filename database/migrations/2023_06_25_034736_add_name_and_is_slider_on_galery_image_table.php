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
        Schema::table('galery_images', function (Blueprint $table) {
            $table->dropColumn('galery_id');
            $table->boolean('is_slider')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('galery_images', function (Blueprint $table) {
            $table->dropColumn('is_slider');
            $table->bigInteger('galery_id')->unsigned();
        });
    }
};
