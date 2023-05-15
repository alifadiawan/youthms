<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Produk;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $j = 'services_id';
        $n = 'nama_produk';
        $h =  'harga';
        $d = 'deskripsi';

        $desain = [
            [
                $j => 1,
                $n => 'mockup website',
                $h => '78100',
                $d => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore, nemo!',
            ],
            [
                $j => 2,
                $n => 'analisa user',
                $h => '24000',
                $d => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Libero explicabo a culpa molestiae aperiam quisquam.',
            ],
            [
                $j => 3,
                $n => 'poster pendidikan',
                $h => '239999',
                $d => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic quo provident reiciendis eius.',
            ],
            [
                $j => 3,
                $n => 'poster kesehatan',
                $h => '239999',
                $d => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic quo provident reiciendis eius.',
            ],
        ];


        $aplikasi = [
            [
                $j => 4,
                $n => 'kasir',
                $h => '218000',
                $d => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ea, rerum voluptatibus.',
            ],
            [
                $j => 4,
                $n => 'absensi',
                $h => '420000',
                $d => '
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum rem voluptates eligendi saepe quibusdam ad odit quod eaque veritatis? Omnis.',
            ],
            [
                $j => 5,
                $n => 'absensi',
                $h => '69000',
                $d => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Beatae excepturi ipsa quibusdam? Velit perspiciatis aliquid earum! Voluptates, alias, ratione ducimus nemo voluptate sunt explicabo sed recusandae sint consectetur ipsum.',
            ],
            [
                $j => 5,
                $n => 'pendataan barang',
                $h => '69000',
                $d => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Beatae excepturi ipsa quibusdam? Velit perspiciatis aliquid earum! Voluptates, alias, ratione ducimus nemo voluptate sunt explicabo sed recusandae sint consectetur ipsum.',
            ],
            [
                $j => 6,
                $n => 'browser',
                $h => '69000',
                $d => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Beatae excepturi ipsa quibusdam? Velit perspiciatis aliquid earum! Voluptates, alias, ratione ducimus nemo voluptate sunt explicabo sed recusandae sint consectetur ipsum.',
            ],
            [
                $j => 6,
                $n => 'pemutar musik',
                $h => '69000',
                $d => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Beatae excepturi ipsa quibusdam? Velit perspiciatis aliquid earum! Voluptates, alias, ratione ducimus nemo voluptate sunt explicabo sed recusandae sint consectetur ipsum.',
            ]
        ];

        Produk::insert($desain);
        Produk::insert($aplikasi);
    }
}
