<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('itempesanans', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('pesanan_id');
            $table->unsignedInteger('menu_id');
            $table->string('jumlah');
            $table->string('harga_satuan');
            $table->string('subtotal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('itempesanans');
    }
};
