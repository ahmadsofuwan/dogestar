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
        Schema::create('user_widraw_doges', function (Blueprint $table) {
            $table->id();
            $table->integer('reff');
            $table->string('saldo');
            $table->enum('status', ['request', 'reject', 'accept'])->default('request');
            $table->string("wallet");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_widraw_doges');
    }
};
