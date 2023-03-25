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
        Schema::create('cement_plant_type', function (Blueprint $table) {
            $table->increments('cement_plant_type_id');
            $table->string('cement_plant_type',250);
            $table->timestamps();
            $table->integer('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cement_plant_type');
    }
};
