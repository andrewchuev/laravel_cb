<?php

use App\Models\Location;
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
        Schema::create('pickup_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('delivery_type');
            $table->unsignedTinyInteger('delivery_time_type');
            $table->foreignIdFor(Location::class)->nullable()->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('address')->nullable();
            $table->string('lng')->nullable();
            $table->string('lat')->nullable();
            $table->dateTime('date')->nullable();
            $table->time('timeslot_from')->nullable();
            $table->time('timeslot_to')->nullable();
            $table->time('office_time')->nullable();
            $table->string('contact_name')->nullable();
            $table->string('contact_phone')->nullable();
            $table->string('contact_email')->nullable();
            $table->string('company_name')->nullable();
            $table->string('company_email')->nullable();
            $table->string('special_instructions')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pickup_details');
    }
};
