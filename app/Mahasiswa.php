<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $guarded = [
        'id'
    ];

    public function angkatan()
    {
        return $this->belongsTo(Angkatan::class);
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
}
