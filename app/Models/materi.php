<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class materi extends Model
{
    protected $guarded = ['id'];

    public function tugas()
    {
        return $this->hasMany(Tugas::class);
    }
    public function gurus()
    {
        return $this->belongsTo(Guru::class);
    }
    public function nilais()
    {
        return $this->hasMany(nilai::class);
    }

    public function siswas()
    {
        return $this->hasMany(siswa::class);
    }

    public function kelas()
    {
        return $this->belongsTo(kelas::class);
    }

}
