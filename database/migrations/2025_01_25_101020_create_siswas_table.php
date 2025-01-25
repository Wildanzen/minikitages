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
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_siswa')->unique();
            $table->string('kelas');
            $table->string('alamat');
            $table->enum('status',['aktif','nonaktif']);
            $table->foreignId('guru_id')->constrained('gurus');
            $table->foreignId('materi_id')->constrained('materis');
            $table->foreignId('kelas_id')->constrained('kelas');
            $table->foreignId('tugas_id')->constrained('tugas');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswas');
    }
};
