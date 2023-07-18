<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\JenisLayanan;
use App\Models\Segmen;
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
            RoleSeeder::class,
            UserSeeder::class,
            UserkwSeeder::class,

            // end user
            MemberSeeder::class,
            
            // produk
            Jenis_LayananSeeder::class,
            ServicesSeeder::class,
            ServicesIllsSeeder::class,
            ProdukSeeder::class,
            PaketSeeder::class,
            
            
            // transaksi
            TransaksiSeeder::class,
            GateawaySeeder::class,
            TransaksiDetailSeeder::class,
            RequestUserSeeder::class,
            PembayaranSeeder::class,

            //misc
            VisitorSeeder::class,

            //portofolio
            PortoIllsSeeder::class,
            PortoSeeder::class,
            //blog
            SegmenSeeder::class,
            BlogSeeder::class

        ]);
    }

}
