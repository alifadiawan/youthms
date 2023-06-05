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
        Schema::create('gateaways', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('nama_gateaway');
            $table->string('nomor_rekening')->nullable();
            $table->string('nomor_va')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gateaways');
    }
};
