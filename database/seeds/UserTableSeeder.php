<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::insert([
            [
                'name' => 'Arfian Dimas Andi Permana',
                'email' => 'arfiandimas1929@gmail.com',
                'password' => \Hash::make('Kimcilracing1929')
            ],
            [
                'name' => 'Barjono',
                'email' => 'barjono@gmail.com',
                'password' => \Hash::make('barjono123')
            ]
        ]);
    }
}
