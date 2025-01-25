<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $guarded = ['id'];

    public function gurus()
    {
        return $this->hasMany(Guru::class);

    }
    public function siswas()
    {
        return $this->hasMany(siswa::class);
    }
}
