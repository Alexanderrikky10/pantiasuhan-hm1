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
        Schema::create('pendaftarans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_anak');
            $table->date('tanggal_lahir');
            $table->text('alamat_lengkap');
            $table->string('email')->nullable();
            $table->string('nomor_telepon')->nullable();

            // Dokumen upload
            $table->string('surat_tidak_mampu')->nullable(); // Upload dokumen PDF/JPG
            $table->string('surat_kematian_ayah')->nullable(); // Optional jika ayah sudah meninggal
            $table->string('ktp_orang_tua')->nullable();
            $table->string('kartu_keluarga')->nullable();
            $table->string('foto_rumah')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftarans');
    }
};
