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
            'kabupaten' => 'Buleleng',
            'alamat' => $this->faker->address(),
            'deskripsi' => $this->faker->paragraph(rand(15, 25)),
            'like' => $this->faker->numberBetween(0, 100000),
            'dislike' => $this->faker->numberBetween(0, 100000),
        ];
    }
}
