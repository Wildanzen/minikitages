<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $table = 'nilai';
    protected $guarded = ['id'];

    public function guru()
    {
    return $this->belongsTo(Guru::class);
    }

    public function siswa()
    {
    return $this->belongsTo(Siswa::class);
    }

    public function tugas()
    {
    return $this->belongsTo(Tugas::class);
    }


}