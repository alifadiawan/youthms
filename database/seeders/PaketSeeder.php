<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Paket;
use App\Models\Produk;

class PaketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buat beberapa paket baru
                $paket1 = Paket::create(['nama_paket' => 'Paket A']);
                $paket2 = Paket::create(['nama_paket' => 'Paket B']);
                $paket3 = Paket::create(['nama_paket' => 'Paket C']);
                $paket4 = Paket::create(['nama_paket' => 'Paket D']);
                
                // Ambil beberapa produk yang ingin dihubungkan dengan paket
                $produk1 = Produk::find(2);
                $produk2 = Produk::find(5);
                $produk3 = Produk::find(8);

                // Ambil beberapa produk yang ingin dihubungkan dengan paket
                $produk4 = Produk::find(4);
                $produk5 = Produk::find(6);
                $produk6 = Produk::find(11);

                // Ambil beberapa produk yang ingin dihubungkan dengan paket
                $produk7 = Produk::find(3);
                $produk8 = Produk::find(7);
                $produk9 = Produk::find(9);
                $produk10 = Produk::find(10);
                $produk11 = Produk::find(11);

                // Ambil beberapa produk yang ingin dihubungkan dengan paket
                $produk12 = Produk::find(12);
                $produk13 = Produk::find(14);
                $produk14 = Produk::find(15);
                $produk15 = Produk::find(16);
                $produk16 = Produk::find(18);
                $produk17 = Produk::find(19);
                $produk18 = Produk::find(21);

                // Attach produk ke paket menggunakan metode attach()
                $paket1->produk()->attach([$produk1->id, $produk2->id, $produk3->id]);
                $paket2->produk()->attach([$produk4->id, $produk5->id, $produk6->id]);
                $paket2->produk()->attach([$produk7->id, $produk8->id, $produk9->id, $produk10->id, $produk11->id]);
                $paket2->produk()->attach([$produk12->id, $produk13->id, $produk14->id, $produk15->id, $produk16->id, $produk17->id, $produk18->id,]);
    }
}
