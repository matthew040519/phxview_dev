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
        Schema::create('conversion', function (Blueprint $table) {
            $table->id();
            $table->integer('member_id');
            $table->decimal('withdraw', 8, 2);
            $table->decimal('conversion', 8, 2);
            $table->text('type');
            $table->timestamp('date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conversion');
    }
};
