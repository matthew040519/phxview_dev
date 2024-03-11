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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->text('username')->unique();
            $table->text('first_name');
            $table->text('middle_name');
            $table->text('last_name');
            $table->date('birthday');
            $table->text('province_code');
            $table->text('city_code');
            $table->text('brgy_code');
            $table->text('gender');
            $table->text('contact_number');
            $table->text('Email');
            $table->text('member_code')->unique();
            $table->text('sponsor');
            $table->text('upline');
            $table->text('position');
            $table->text('tron_wallet_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
