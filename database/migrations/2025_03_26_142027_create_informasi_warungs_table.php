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
        Schema::create('informasi_warung', function (Blueprint $table) {
            $table->id();
            $table->string('nama_rumah_makan'); // Nama Rumah Makan
            $table->string('contact'); // Nomor Kontak
            $table->string('email')->unique(); // Email
            $table->time('jam_buka'); // Jam Buka
            $table->time('jam_tutup'); // Jam Tutup
            $table->text('alamat'); // Alamat Lengkap
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('informasi_warung');
    }
};
