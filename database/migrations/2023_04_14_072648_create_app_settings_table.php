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
        Schema::create('app_settings', function (Blueprint $table) {
            $table->id();
            $table->string('android_version')->nullable();
            $table->boolean('android_force_update')->default(false);
            $table->text('android_update_message')->nullable();
            $table->string('ios_version')->nullable();
            $table->boolean('ios_force_update')->default(false);
            $table->text('ios_update_message')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('app_settings');
    }
};
