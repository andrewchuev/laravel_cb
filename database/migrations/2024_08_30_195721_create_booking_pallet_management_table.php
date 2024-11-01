<?php

use App\Models\Booking;
use App\Models\PalletManagement;
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
        Schema::create('booking_pallet_management', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Booking::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignIdFor(PalletManagement::class)->constrained('pallet_management')->cascadeOnDelete()->cascadeOnUpdate();
            $table->unsignedTinyInteger('qty');
            $table->unsignedTinyInteger('pallet_method');
            $table->string('account_number')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking_pallet_management');
    }
};
