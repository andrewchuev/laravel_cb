<?php

use App\Models\Booking;
use App\Models\BookingConsignmentGroup;
use App\Models\Consignment;
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
        Schema::create('booking_consignments', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(BookingConsignmentGroup::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignIdFor(Consignment::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->unsignedInteger('qty');
            $table->double('length')->unsigned()->nullable();
            $table->double('width')->unsigned()->nullable();
            $table->double('height')->unsigned()->nullable();
            $table->double('weight')->unsigned()->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking_consignments');
    }
};
