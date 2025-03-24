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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('no_pesanan')->unique();
            $table->unsignedBigInteger('user_id');
            $table->string('nama_lengkap');
            $table->string('nomor_handphone');
            $table->text('alamat');
            $table->string('jenis_layanan');
            $table->string('jenis_sepatu');
            $table->date('tanggal_pesan');
            $table->string('status_pesanan'); // Tambahkan status pesanan
            $table->string('status_transaksi'); // Tambahkan status transaksi
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });

        Schema::dropIfExists('orders');
    }
};
