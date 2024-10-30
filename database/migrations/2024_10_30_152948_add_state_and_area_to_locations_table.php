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
        Schema::table('locations', function (Blueprint $table) {
            $table->unsignedBigInteger('state_id')->nullable();
            $table->unsignedBigInteger('area_id')->nullable();

            $table->foreign('state_id')->references('id')->on('states')->onDelete('set null');
            $table->foreign('area_id')->references('id')->on('areas')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('locations', function (Blueprint $table) {
            $table->dropForeign(['state_id']);
            $table->dropForeign(['area_id']);
            $table->dropColumn(['state_id', 'area_id']);
        });
    }
};
