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
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->dateTime('tanggal_bayar')->nullable();
            $table->string('no_pesanan');
            $table->string('jenis_layanan');
            $table->string('metode_bayar');
            $table->unsignedBigInteger('metode_id')->nullable();
            $table->decimal('total_bayar', 15, 2);
            $table->string('bukti_pembayaran');
            $table->string('status_pembayaran')->default('Menunggu Konfirmasi');
            $table->timestamps();

            // Relasi ke users (jika kamu punya tabel users)
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};
