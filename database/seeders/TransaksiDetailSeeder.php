<?php

namespace Database\Seeders;

use App\Models\TransaksiDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransaksiDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $trxd = [
            [
                'subtotal' => '24000',
                'transaksi_id' => '5',
                'produk_id' => '2',
                'quantity' => '1',
            ],
            [
                'subtotal' => '239999',
                'transaksi_id' => '5',
                'produk_id' => '3',
                'quantity' => '1',
            ],
            [
                'subtotal' => '959996',
                'transaksi_id' => '6',
                'produk_id' => '4',
                'quantity' => '4',
            ],
            [
                'subtotal' => '1260000',
                'transaksi_id' => '6',
                'produk_id' => '6',
                'quantity' => '3',
            ],
            [
                'subtotal' => '138000',
                'transaksi_id' => '6',
                'produk_id' => '10',
                'quantity' => '2',
            ],
            [
                'subtotal' => '207000',
                'transaksi_id' => '6',
                'produk_id' => '10',
                'quantity' => '3',
            ],
            [
                'subtotal' => '654000',
                'transaksi_id' => '7',
                'produk_id' => '5',
                'quantity' => '3',
            ],
            [
                'subtotal' => '138000',
                'transaksi_id' => '7',
                'produk_id' => '10',
                'quantity' => '2',
            ],
            [
                'subtotal' => '414000',
                'transaksi_id' => '7',
                'produk_id' => '7',
                'quantity' => '6',
            ],
            [
                'subtotal' => '276000',
                'transaksi_id' => '7',
                'produk_id' => '8',
                'quantity' => '4',
            ],
            [
                'subtotal' => '207000',
                'transaksi_id' => '8',
                'produk_id' => '8',
                'quantity' => '3',
            ],
            [
                'subtotal' => '138000',
                'transaksi_id' => '8',
                'produk_id' => '7',
                'quantity' => '2',
            ],
        ];

        TransaksiDetail::insert($trxd);
    }
}
