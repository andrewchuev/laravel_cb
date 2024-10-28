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
        Schema::table('pickup_details', function (Blueprint $table) {
            $table->renameColumn('delivery_type', 'pickup_type');
            $table->renameColumn('delivery_time_type', 'pickup_time_type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pickup_details', function (Blueprint $table) {
            $table->renameColumn('pickup_type', 'delivery_type');
            $table->renameColumn('pickup_time_type', 'delivery_time_type');
        });
    }
};
