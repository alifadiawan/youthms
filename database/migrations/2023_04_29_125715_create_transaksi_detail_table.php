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
        Schema::create('transaksi_detail', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('subtotal');
            $table->unsignedBigInteger('transaksi_id');
            $table->foreign('transaksi_id')->references('id')->on('transaksi')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            // $table->unsignedBigInteger('gateaways_id')->nullable();
            // $table->foreign('gateaways_id')->references('id')->on('gateaways')
            //     ->onUpdate('cascade')
            //     ->onDelete('cascade');
            // $table->foreignId('pembayarans_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->unsignedBigInteger('produk_id');
            $table->foreign('produk_id')->references('id')->on('produk')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->integer('quantity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_detail');
    }
};
