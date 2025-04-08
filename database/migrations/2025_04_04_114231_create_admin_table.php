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
        Schema::create('admin', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username')->unique();
            $table->string('password');
            $table->string('photo')->nullable();
            $table->timestamps();
        });

        // Insert admin default
        \DB::table('admin')->insert([
            'name' => 'Deniar Angga',
            'username' => 'admin',
            'password' => bcrypt('admin'),
            'photo' => 'FOTO.jpg', // Default photo
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin');
    }
};
