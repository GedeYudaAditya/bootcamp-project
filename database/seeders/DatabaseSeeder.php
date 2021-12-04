<?php

namespace Database\Seeders;

use App\Models\objekwisata;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        User::create([
            'name' => "Gede Yuda Aditya",
            'email' => 'akun9592@gmail.com',
            'kategoriAkun' => 'guide',
            'noTlp' => '087124543987',
            'alamat' => 'Banyuning barat',
            'password' => bcrypt('yuda121201')
        ]);

        User::create([
            'name' => "Kadek Ary Sukaraharja",
            'email' => 'ary@gmail.com',
            'kategoriAkun' => 'guide',
            'noTlp' => '087121222111',
            'alamat' => 'Banyuning barat',
            'password' => bcrypt('anak2211')
        ]);

        User::create([
            'name' => "Ralsei Dremmur",
            'email' => 'ralsei@gmail.com',
            'kategoriAkun' => 'touris',
            'noTlp' => '083382273374',
            'alamat' => 'Banyuning barat',
            'password' => bcrypt('ralsei1212')
        ]);

        objekwisata::factory(50)->create();
    }
}
