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
            $table->string('alamat');
            $table->date('tanggal');
            $table->string('waktu');
            $table->string('nama_lengkap');
            $table->string('email');
            $table->string('nomor_handphone');
            $table->string('jenis_layanan');
            $table->string('jenis_sepatu');
            $table->string('harga');
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
