<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $guarded = [
        'id'
    ];

    public static function boot() {
        parent::boot();

        static::deleting(function($kelas) { // before delete() method call this
            $tidakBerkelas = Kelas::firstOrCreate(['kelas' => 'Tidak Berkelas']);
            Mahasiswa::where('kelas_id', $kelas->id)->update(
                                ['kelas_id' => $tidakBerkelas->id]);
        });
    }
}
