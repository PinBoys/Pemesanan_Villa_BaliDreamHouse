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
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pemesanan_id');
            $table->enum('metode_pembayaran', ['transfer bank', 'e-wallet', 'kartu kredit']);
            $table->datetime('tanggal_pembayaran')->nullable();
            $table->decimal('jumlah_bayar', 12, 2);
            $table->string('bukti_bayar')->nullable();
            $table->enum('status_pembayaran', ['menunggu konfirmasi', 'berhasil', 'gagal'])->default('menunggu konfirmasi');
            $table->timestamps();

            $table->foreign('pemesanan_id')->references('id')->on('pemesanans')->onDelete('cascade');
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
