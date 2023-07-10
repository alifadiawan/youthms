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
            // $table->unsignedBigInteger('gateaway_id');
            // $table->foreign('gateaway_id')->references('id')->on('gateaways')
            // ->onUpdate('cascade')
            // ->onDelete('cascade');
            $table->string('total_bayar');
            $table->foreignId('request_user_id')->nullable()->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('pembayaran_ke')->nullable();
            $table->unsignedBigInteger('bank_id')->nullable();
            $table->foreign('bank_id')->references('id')->on('banks')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->unsignedBigInteger('ewallet_id')->nullable();
            $table->foreign('ewallet_id')->references('id')->on('ewallets')
                ->onUpdate('cascade')
                ->onDelete('cascade');
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
