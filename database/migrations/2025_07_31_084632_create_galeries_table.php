<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('galeries', function (Blueprint $table) {
            $table->id();
            $table->string('judul'); // Judul gambar/foto
            $table->text('deskripsi')->nullable(); // Deskripsi opsional
            $table->string('gambar'); // Nama file atau path gambar
            $table->enum('kategori', ['kegiatan', 'fasilitas', 'lainnya'])->default('lainnya');
            $table->boolean('status')->default(false); // True: tampil, False: disembunyikan
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('galeries');
    }
};
