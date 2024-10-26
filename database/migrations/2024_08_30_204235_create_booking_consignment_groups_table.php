<?php

use App\Models\Booking;
use App\Models\TemperatureMode;
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
        Schema::create('booking_consignment_groups', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Booking::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignIdFor(TemperatureMode::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->double('total_qty')->nullable();
            $table->double('total_spaces')->nullable();
            $table->double('total_volume')->nullable();
            $table->double('total_weight')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking_consignment_groups');
    }
};
