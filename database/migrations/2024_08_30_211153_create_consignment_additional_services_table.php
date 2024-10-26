<?php

use App\Models\AdditionalService;
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
        Schema::create('consignment_additional_services', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Consignment::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignIdFor(AdditionalService::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->unsignedBigInteger('booking_consignment_group_id');
            $table->unsignedInteger('qty')->nullable();
            $table->float('value')->nullable();

            $table->foreign('booking_consignment_group_id', 'cons_add_services_booking_group_fk')
            ->references('id')->on('booking_consignment_groups')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consignment_additional_services');
    }
};
