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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            // Kolom Konten Utama
            $table->string('judul', 255);
            $table->string('slug', 255)->unique(); // Untuk URL unik
            $table->text('deskripsi_singkat')->nullable(); // Untuk META deskripsi / ringkasan
            $table->string('konten'); // longtext untuk menampun isi artikel yang panjang (HTML)
            
            // Kolom Konten METADATA
            $table->string('author', 200);
            $table->string('kategori', 50)->nullable();
            $table->string('thumbnail_path')->nullable(); // Path atau lokasi gambar utama
            
            // Kolom Status
            $table->boolean('is_published')->default(false); // Status terbit atau masih draf

            $table->timestamps(); // created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
