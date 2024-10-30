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
        Schema::table('additional_services', function (Blueprint $table) {
            $table->renameColumn('type', 'type_id');
            $table->renameColumn('using', 'using_id');
            $table->unsignedBigInteger('type_id')->nullable()->change();
            $table->unsignedBigInteger('using_id')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('additional_services', function (Blueprint $table) {
            $table->renameColumn('type_id', 'type');
            $table->renameColumn('using_id', 'using');
            $table->unsignedBigInteger('type')->nullable(false)->change();
            $table->unsignedBigInteger('using')->nullable(false)->change();
        });
    }
};
