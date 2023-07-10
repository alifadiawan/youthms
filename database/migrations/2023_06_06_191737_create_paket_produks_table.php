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
        Schema::create('paket_produks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('produk_id');
            $table->foreign('produk_id')->references('id')->on('produk')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->unsignedBigInteger('paket_id');
            $table->foreign('paket_id')->references('id')->on('pakets')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paket_produks');
    }
};
