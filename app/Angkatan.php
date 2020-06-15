<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Angkatan extends Model
{
    protected $guarded = [
        'id'
    ];

    public static function boot() {
        parent::boot();

        static::deleting(function($angkatan) { // before delete() method call this
            $tidakBerangkatan = Angkatan::firstOrCreate(['tahun' => '0000']);
            Mahasiswa::where('angkatan_id', $angkatan->id)->update(
                                ['angkatan_id' => $tidakBerangkatan->id]);
        });
    }
}