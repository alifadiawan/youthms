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
        $f = 'foto';

        $aplikasi = [
            [
                $j => 1,
                $n => 'Website Sekolah/Yayasan/dan lain-lain',
                $h => '218000',
                $d => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ea, rerum voluptatibus.',
                $f => 'produk-example1.png'
            ],
            [
                $j => 1,
                $n => 'Website Company Profile',
                $h => '420000',
                $d => '
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum rem voluptates eligendi saepe quibusdam ad odit quod eaque veritatis? Omnis.',
                $f => 'produk-example2.png'
            ],
            [
                $j => 1,
                $n => 'Aplikasi Kasir Berbasis Web',
                $h => '69000',
                $d => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Beatae excepturi ipsa quibusdam? Velit perspiciatis aliquid earum! Voluptates, alias, ratione ducimus nemo voluptate sunt explicabo sed recusandae sint consectetur ipsum.',
                $f => 'produk-example3.png'
            ],
            [
                $j => 1,
                $n => 'Website E-commerce',
                $h => '69000',
                $d => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Beatae excepturi ipsa quibusdam? Velit perspiciatis aliquid earum! Voluptates, alias, ratione ducimus nemo voluptate sunt explicabo sed recusandae sint consectetur ipsum.',
                $f => 'produk-example4.png'
            ],
        ];

        $marketing = [
            [
                $j => 4,
                $n => 'Social Media Management',
                $h => '89000',
                $d => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Beatae excepturi ipsa quibusdam? Velit perspiciatis aliquid earum! Voluptates, alias, ratione ducimus nemo voluptate sunt explicabo sed recusandae sint consectetur ipsum.',
                $f => 'produk-example5.png'
            ],
            [
                $j => 4,
                $n => 'Social Media Post',
                $h => '99000',
                $d => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Beatae excepturi ipsa quibusdam? Velit perspiciatis aliquid earum! Voluptates, alias, ratione ducimus nemo voluptate sunt explicabo sed recusandae sint consectetur ipsum.',
                $f => 'produk-example6.png'
            ],
        ];

        $desain = [
            [
                $j => 8,
                $n => 'Banner/X-Banner/Poster',
                $h => '78100',
                $d => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore, nemo!',
                $f => 'produk-example7.png'
            ],
            [
                $j => 7,
                $n => 'Packaging+Mock Up',
                $h => '24000',
                $d => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Libero explicabo a culpa molestiae aperiam quisquam.',
                $f => 'produk-example8.png'
            ],
            [
                $j => 7,
                $n => 'Kartu Nama',
                $h => '239999',
                $d => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic quo provident reiciendis eius.',
                $f => 'produk-example9.png'
            ],
            [
                $j => 7,
                $n => 'Logo',
                $h => '239999',
                $d => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic quo provident reiciendis eius.',
                $f => 'produk-example10.png'
            ],
            [
                $j => 8,
                $n => 'Brosur/Pamflet/Leaflet',
                $h => '239999',
                $d => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic quo provident reiciendis eius.',
                $f => 'produk-example11.png'
            ],
            [
                $j => 7,
                $n => 'Poster Penelitian',
                $h => '239999',
                $d => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic quo provident reiciendis eius.',
                $f => 'produk-example12.png'
            ],
            [
                $j => 7,
                $n => 'Cover Buku',
                $h => '239999',
                $d => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic quo provident reiciendis eius.',
                $f => 'produk-example13.png'
            ],
        ];

        $editing = [
            [
                $j => 9,
                $n => 'Memindahkan Dari Skripsi Ke Jurnal/Makalah Ke Artikel',
                $h => '36699',
                $d => 'lorem ipsum dolor sit amet',
                $f => 'produk-example14.png'
            ],
            [
                $j => 10,
                $n => 'PowerPoint/Presentasi',
                $h => '54399',
                $d => 'lorem ipsum dolor sit amet',
                $f => 'produk-example15.png'
            ],
            [
                $j => 14,
                $n => 'Editing Full Format',
                $h => '230999',
                $d => 'lorem ipsum dolor sit amet',
                $f => 'produk-example16.png'
            ],
            [
                $j => 12,
                $n => 'Surat Menyurat',
                $h => '34223',
                $d => 'lorem ipsum dolor sit amet',
                $f => 'produk-example17.png'
            ],
            [
                $j => 9,
                $n => 'Transkrip Data Audio To Word',
                $h => '89434',
                $d => 'lorem ipsum dolor sit amet',
                $f => 'produk-example18.png'
            ],
            [
                $j => 14,
                $n => 'Editing Buku+Cover',
                $h => '302934',
                $d => 'lorem ipsum dolor sit amet',
                $f => 'produk-example19.png'
            ],
            [
                $j => 13,
                $n => 'Cek Plagiarisme',
                $h => '234923',
                $d => 'lorem ipsum dolor sit amet',
                $f => 'produk-example20.png'
            ],
            [
                $j => 14,
                $n => 'Pengetikan & Parafrase',
                $h => '732487',
                $d => 'lorem ipsum dolor sit amet',
                $f => 'produk-example21.png'
            ],
        ];

        Produk::insert($aplikasi);
        Produk::insert($marketing);
        Produk::insert($desain);
        Produk::insert($editing);
    }
}
