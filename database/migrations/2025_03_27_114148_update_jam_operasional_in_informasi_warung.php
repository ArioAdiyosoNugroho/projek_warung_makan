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
        Schema::table('informasi_warung', function (Blueprint $table) {
            // Tambahkan kolom jam_operasional dalam format JSON
            $table->json('jam_operasional')->nullable()->after('email');
            
            // Hapus kolom jam_buka dan jam_tutup karena sudah tidak dibutuhkan
            $table->dropColumn(['jam_buka', 'jam_tutup']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('informasi_warung', function (Blueprint $table) {
            // Tambahkan kembali kolom yang dihapus
            $table->time('jam_buka')->nullable();
            $table->time('jam_tutup')->nullable();
            
            // Hapus kolom jam_operasional jika rollback
            $table->dropColumn('jam_operasional');
        });
    }
};
