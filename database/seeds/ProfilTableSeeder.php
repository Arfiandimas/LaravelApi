<?php

use Illuminate\Database\Seeder;

class ProfilTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Profil::insert([
            [
                'user_id' => '1',
                'nama' => 'Arfian Dimas Andi Permana',
                'jenis_kelamin' => 'laki-laki',
                'alamat' => 'Kulon Progo',
                'no_telp' => '098677544677'
            ],
            [
                'user_id' => '2',
                'nama' => 'Barjono',
                'jenis_kelamin' => 'perempuan',
                'alamat' => 'Kulon Kali',
                'no_telp' => '098677544777'
            ]
        ]);
    }
}
