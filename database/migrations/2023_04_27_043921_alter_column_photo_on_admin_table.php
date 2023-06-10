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
        Schema::table('admins', function (Blueprint $table) {
            // drop coloumn photo
            $table->dropColumn('photo');
            $table->text('avatar')->nullable()->after('password');
            $table->bigInteger('role_id')->unsigned()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('admins', function (Blueprint $table) {
            // drop coloumn photo
            $table->dropColumn('avatar');
            $table->text('photo')->nullable()->after('password');
            $table->dropColumn('role_id');
        });
    }
};
