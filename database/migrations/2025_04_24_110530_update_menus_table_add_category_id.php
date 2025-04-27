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
        Schema::table('menus', function (Blueprint $table) {
            $table->dropColumn('category'); // hapus kolom lama (optional, hati-hati kalau sudah ada data)
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
        });
    }
    
    public function down(): void
    {
        Schema::table('menus', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
            $table->dropColumn('category_id');
            $table->string('category')->nullable(); // restore kolom lama (jika perlu rollback)
        });
    }
    
};
