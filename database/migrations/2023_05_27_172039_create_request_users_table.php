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
        Schema::create('request_users', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pemesan');
            $table->unsignedBigInteger('transaksi_id');
            $table->foreign('transaksi_id')->references('id')->on('transaksi')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->string('deskripsi')->nullable();
            $table->string('status');
            $table->date('tanggal_mulai');
            $table->date('jatuh_tempo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('request_users');
    }
};
