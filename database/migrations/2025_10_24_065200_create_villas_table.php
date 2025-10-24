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
        Schema::create('villas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_villa');
            $table->string('lokasi');
            $table->text('deskripsi');
            $table->decimal('harga_per_malam', 12, 2);
            $table->integer('kapasitas');
            $table->integer('jumlah_kamar');
            $table->integer('jumlah_kamar_mandi');
            $table->enum('status_villa', ['tersedia', 'tidak tersedia'])->default('tersedia');
            $table->string('foto_villa')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('villas');
    }
};
