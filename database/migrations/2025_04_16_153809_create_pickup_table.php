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
        Schema::create('pickup', function (Blueprint $table) {
            $table->id();
            $table->string('no_pesanan')->unique();
            $table->unsignedBigInteger('user_id');
            $table->string('midtrans_order_id')->nullable();
            $table->string('alamat');
            $table->date('tanggal_pesan');
            $table->string('nama_lengkap');
            $table->string('email');
            $table->string('nomor_handphone');
            $table->string('jenis_layanan');
            $table->string('jumlah_item');
            $table->string('jenis_sepatu');
            $table->integer('subtotal_pesanan');
            $table->integer('subtotal_pengiriman');
            $table->integer('biaya_layanan');
            $table->integer('total');
            $table->string('status_pesanan');
            $table->string('status_transaksi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pickup');
    }
};
