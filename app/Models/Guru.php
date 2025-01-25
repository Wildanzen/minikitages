<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $guarded = ['id'];

    public function materis()
    {
        return $this->hasMany(Materi::class);
    }

    public function tugas()
    {
        return $this->hasMany(Tugas::class);
    }

    public function nilais()
    {
        return $this->hasMany(nilai::class);
    }
}
