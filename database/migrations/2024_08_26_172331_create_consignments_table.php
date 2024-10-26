<?php

use App\Models\AdditionalService;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Consignment;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('consignments', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->unsignedInteger('max_qty')->nullable();
            $table->double('max_length')->unsigned()->nullable();
            $table->double('max_width')->unsigned()->nullable();
            $table->double('max_height')->unsigned()->nullable();
            $table->double('max_weight')->unsigned()->nullable();
            $table->foreignIdFor(AdditionalService::class)->nullable()->constrained()->nullOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consignments');
    }
};
