<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
    protected $guarded = ['id'];

    public function materis()
    {
        return $this->belongsTo(Materi::class);
    }
    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }

    public function kelas()
    {
        return $this->belongsTo(kelas::class);
    }

    public function tugas()
    {
        return $this->hasMany(Tugas::class);
    }
}
