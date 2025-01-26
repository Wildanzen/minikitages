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
        Schema::create('materis', function (Blueprint $table) {
            $table->id();
            $table->string('nama_materi')->unique();
            $table->foreignId('guru_id')->constrained('gurus');
            $table->foreignId('kelas_id')->constrained('kelas');
            $table->string('deskripsi')->nullable();
            $table->foreignId('siswa_id')->constrained('siswas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materis');
    }
};