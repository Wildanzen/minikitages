<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $guarded = ['id'];

    public function gurus()
    {
        return $this->hasMany(Guru::class);
    }
    public function materis()
    {
        return $this->hasMany(Materi::class);
    }

    public function tugas()
    {
        return $this->hasMany(Tugas::class);
    }

    
}
