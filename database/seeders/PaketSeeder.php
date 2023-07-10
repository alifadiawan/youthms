<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Paket;
use App\Models\paket_produk;
use App\Models\Produk;

class PaketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        // Buat beberapa paket baru
        $paket1 = Paket::insert(
            [
                ['nama_paket' => 'Paket A'],
                ['nama_paket' => 'Paket B'],
                ['nama_paket' => 'Paket C'],
                ['nama_paket' => 'Paket D']
            ]
        );

        // paket::insert($paket1);


        // Attach produk ke paket menggunakan metode attach()

        // $paket1->produk()->attach([$produk1->id, $produk2->id, $produk3->id]);
        // $paket2->produk()->attach([$produk4->id, $produk5->id, $produk6->id]);
        // $paket3->produk()->attach([$produk7->id, $produk8->id, $produk9->id, $produk10->id, $produk11->id]);
        // $paket4->produk()->attach([$produk12->id, $produk13->id, $produk14->id, $produk15->id, $produk16->id, $produk17->id, $produk18->id,]);

    }
}
