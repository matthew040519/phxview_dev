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
        Schema::create('producttransaction', function (Blueprint $table) {
            $table->id();
            $table->text('transaction_id');
            $table->text('user_id');
            $table->integer('product_id');
            $table->integer('category_id');
            $table->integer('qty');
            $table->decimal('price', 8, 2);
            $table->text('size')->nullable();
            $table->timestamp('tdate');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('producttransaction');
    }
};
