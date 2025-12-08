<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembayaransTable extends Migration
{
    public function up()
    {
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pemesanan_id');

            $table->string('metode_pembayaran');
            $table->integer('jumlah_bayar');
            $table->enum('status_pembayaran', ['pending', 'berhasil', 'gagal'])->default('pending');
            $table->date('tgl_pembayaran')->nullable();

            $table->timestamps();

            $table->foreign('pemesanan_id')
                ->references('id')
                ->on('pemesanans')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pembayarans');
    }
}
