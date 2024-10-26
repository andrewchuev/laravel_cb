<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('consumables', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->unsignedInteger('max_qty')->nullable();
            $table->double('length')->unsigned()->nullable();
            $table->double('width')->unsigned()->nullable();
            $table->double('height')->unsigned()->nullable();
            $table->double('weight')->unsigned()->nullable();
            $table->double('price')->unsigned()->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consumables');
    }
};
