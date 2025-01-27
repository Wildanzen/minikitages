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
    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }
    public function nilai()
    {
        return $this->hasMany(nilai::class);
    }

    public function siswa()
    {
        return $this->hasMany(siswa::class);
    }

    public function kelas()
    {
        return $this->belongsTo(kelas::class);
    }

}
