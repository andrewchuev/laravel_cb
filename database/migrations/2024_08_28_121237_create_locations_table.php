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
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->float('lng')->nullable();
            $table->float('lat')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('postcode')->nullable();
            $table->timestamps();
        });

        Schema::create('location_schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Location::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->unsignedInteger('day_number')->nullable();
            $table->time('from')->nullable();
            $table->time('to')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('location_schedules');
        Schema::dropIfExists('locations');
    }
};
