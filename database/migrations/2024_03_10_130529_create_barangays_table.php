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
        Schema::create('barangays', function (Blueprint $table) {
            $table->id();
            $table->text('code');
            $table->text('name');
            $table->text('oldName');
            $table->text('subMunicipalityCode');
            $table->text('cityCode');
            $table->text('municipalityCode');
            $table->text('districtCode');
            $table->text('provinceCode');
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
        Schema::dropIfExists('barangays');
    }
};
