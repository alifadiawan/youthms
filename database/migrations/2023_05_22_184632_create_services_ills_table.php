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
        Schema::create('services_ills', function (Blueprint $table) {
            $table->id();
            $table->string('hero_ills');
            $table->string('hero_text');
            $table->string('ills1');
            $table->string('ills2');
            $table->string('ills3');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services_ills');
    }
};
