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
        Schema::create('directinvites', function (Blueprint $table) {
            $table->id();
            $table->text('sponsor');
            $table->text('username');
            $table->decimal('amount', 8, 2);
            $table->date('tdate');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('directinvites');
    }
};
