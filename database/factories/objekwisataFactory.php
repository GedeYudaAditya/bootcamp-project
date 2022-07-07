<?php

namespace Database\Factories;

use App\Models\objekwisata;
use Illuminate\Database\Eloquent\Factories\Factory;

class objekwisataFactory extends Factory
{

    protected $model = objekwisata::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $rand = rand(0, 4);
        $randU = rand(1, 2);
        if (rand(0, 1) == 0) {
            $type = 'culture';
            $fasilitas = 'Luar Ruangan,Dalam Ruangan';
            if ($rand == 0) {
                $category = 'tari';
            } else if ($rand == 1) {
                $category = 'musik';
            } else if ($rand == 2) {
                $category = 'drama';
            } else if ($rand == 3) {
                $category = 'tradisi';
            } else {
                $category = 'kuliner';
            }
        } else {
            $type = 'nature';
            $fasilitas = 'Tempat Makan,Penginapan';
            if ($rand == 0) {
                $category = 'air terjun';
            } else if ($rand == 1) {
                $category = 'danau';
            } else if ($rand == 2) {
                $category = 'pegunungan';
            } else if ($rand == 3) {
                $category = 'taman';
            } else {
                $category = 'pantai';
            }
        }
        return [
            'namaObjek' => $this->faker->company(),
            'price' => $this->faker->numberBetween(0, 100000),
            'day' => 'senin,selasa,rabu',
            'type' => $type,
            'category' => $category,
            'fk_id_user' => $randU,
            'fasilitas' => $fasilitas,
            'peta' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15799.444563678975!2d115.09142300112862!3d-8.115617997415894!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd19a75a8cd31ed%3A0xd8ccd0338a956584!2sTaman%20Kota%20Singaraja!5e0!3m2!1sid!2sid!4v1639869935301!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>',
            'kabupaten' => 'Buleleng',
            'alamat' => $this->faker->address(),
            'deskripsi' => $this->faker->paragraph(rand(15, 25)),
            'like' => $this->faker->numberBetween(0, 100000),
            'dislike' => $this->faker->numberBetween(0, 100000),
        ];
    }
}
