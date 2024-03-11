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
        Schema::create('citiesmunicipalities', function (Blueprint $table) {
            $table->id();
            $table->text('code');
            $table->text('name');
            $table->text('oldName');
            $table->text('isCapital');
            $table->text('isCity');
            $table->text('isMunicipality');
            $table->text('provinceCode');
            $table->text('districtCode');
            $table->text('regionCode');
            $table->text('islandGroupCode');
            $table->text('psgc10DigitCode');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('citiesmunicipalities');
    }
};
