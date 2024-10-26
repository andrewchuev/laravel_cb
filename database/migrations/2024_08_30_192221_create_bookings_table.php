<?php

use App\Models\DeliveryDetail;
use App\Models\PickupDetail;
use App\Utilities\PermissionHelper;
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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('booking_status');
            $table->unsignedTinyInteger('payment_status');
            $table->string('name')->nullable();
            $table->string('company')->nullable();
            $table->string('email')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('job_reference')->nullable();
            $table->boolean('dangerous_goods')->nullable();
            $table->foreignIdFor(PickupDetail::class)->nullable()->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignIdFor(DeliveryDetail::class)->nullable()->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->float('final_price')->nullable();
            $table->unsignedInteger('total_qty')->nullable();
            $table->unsignedInteger('total_spaces')->nullable();
            $table->unsignedInteger('total_volume')->nullable();
            $table->unsignedInteger('total_weight')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
