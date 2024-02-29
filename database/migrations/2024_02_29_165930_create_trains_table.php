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
        Schema::create('trains', function (Blueprint $table) {
            $table->id();
            $table->string('agency_name', 64);
            $table->string('departure_station', 200);
            $table->string('arrival_station', 200);
            $table->dateTime('departure_date', $precision = 0)->nullable(); 
            $table->dateTime('arrival_date', $precision = 0)->nullable();
            $table->string('train_code', 8) -> unique();
            $table->tinyInteger('wagons_number')->unsigned()->nullable();
            $table->boolean('is_on_time')->default(true);
            $table->boolean('is_deleted')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trains');
    }
};
