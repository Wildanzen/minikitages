<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $guarded = ['id'];

    public function guru()
    {
        return $this->belongsTo(Guru::class);

    }
    public function siswa()
    {
        return $this->hasMany(siswa::class);
    }
}
