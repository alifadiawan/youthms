<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\JenisLayanan;
use App\Models\Services;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        return $this->call([
            // dashboard
            LandingSeeder::class,
            JabatanSeeder::class,
            UserSeeder::class,

            // end user
            MemberSeeder::class,
            TransaksiSeeder::class,

            // produk
            Jenis_LayananSeeder::class,
            ServicesSeeder::class,
            ProdukSeeder::class,

            //misc
            VisitorSeeder::class,

        ]);
    }

}
