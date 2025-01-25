<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    protected $guarded = ['id'];

    public function materis()
    {
        return $this->hasMany(Materi::class);
    }

    public function gurus()
    {
        return $this->belongsTo(Guru::class);
    }
}
