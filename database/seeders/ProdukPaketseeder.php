<?php

namespace Database\Seeders;

use App\Models\paket_produk;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProdukPaketseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $paket = [
            [
                'paket_id' => 1,
                'produk_id' => '2',
            ],
            [
                'paket_id' => 1,
                'produk_id' => '5',
            ],
            [
                'paket_id' => 1,
                'produk_id' => '8',
            ],
            [
                'paket_id' => 2,
                'produk_id' => '4',
            ],
            [
                'paket_id' => 2,
                'produk_id' => '6',
            ],
            [
                'paket_id' => 2,
                'produk_id' => '11',
            ],
            [
                'paket_id' => 3,
                'produk_id' => '3',
            ],
            [
                'paket_id' => 3,
                'produk_id' => '7',
            ],
            [
                'paket_id' => 3,
                'produk_id' => '9',
            ],
            [
                'paket_id' => 3,
                'produk_id' => '10',
            ],
            [
                'paket_id' => 3,
                'produk_id' => '11',
            ],
            [
                'paket_id' => 4,
                'produk_id' => '12',
            ],
            [
                'paket_id' => 4,
                'produk_id' => '14',
            ],
            [
                'paket_id' => 4,
                'produk_id' => '15',
            ],
            [
                'paket_id' => 4,
                'produk_id' => '16',
            ],
            [
                'paket_id' => 4,
                'produk_id' => '18',
            ],
            [
                'paket_id' => 4,
                'produk_id' => '19',
            ],
            [
                'paket_id' => 4,
                'produk_id' => '20',
            ],
        ];

        $paket = paket_produk::insert($paket);
    }
}
