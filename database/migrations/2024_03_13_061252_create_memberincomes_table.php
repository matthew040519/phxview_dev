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
        Schema::create('memberincomes', function (Blueprint $table) {
            $table->id();
            $table->integer('member_id');
            $table->integer('batch');
            $table->timestamp('tdate');
            $table->decimal('income', 8, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('memberincomes');
    }
};
