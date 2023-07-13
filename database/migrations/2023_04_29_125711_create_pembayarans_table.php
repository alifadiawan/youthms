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
        // migration gateaways
        // Schema::create('gateaways', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('image')->nullable();
        //     $table->string('nama_gateaway');
        //     $table->string('atas_nama');
        //     $table->string('nomor_rekening');
        //     // $table->string('nomor_va')->nullable();
        //     $table->timestamps();
        // });


        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('transaksi_id');
            $table->foreign('transaksi_id')->references('id')->on('transaksi')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('total_bayar')->nullable();
            $table->string('unique_code');
            $table->foreignId('request_user_id')->nullable()->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('bank_id')->nullable()->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('ewallet_id')->nullable()->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('pembayaran_ke')->nullable();
            $table->string('status');
            $table->string('note_admin')->nullable();
            $table->string('bukti_tf');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayarans');
    }
};
