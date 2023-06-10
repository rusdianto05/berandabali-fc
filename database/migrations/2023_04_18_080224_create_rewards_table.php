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
        Schema::create('rewards', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('category_reward_id')->unsigned();
            $table->string('name');
            $table->text('image');
            $table->bigInteger('value');
            $table->text('description')->nullable();
            $table->integer('point');
            $table->boolean('is_active')->default(true);
            $table->text('how_to_use')->nullable();
            $table->string('type')->nullable();
            $table->text('merchant_link')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rewards');
    }
};
