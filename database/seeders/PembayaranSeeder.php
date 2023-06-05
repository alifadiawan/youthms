<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Pembayaran;
use Illuminate\Database\Seeder;

class PembayaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pembayaran = [
            [
                'transaksi_id'=>1,
                'gateaways_id'=>1,
                'status'=>'checked',
                'bukti_tf'=>'kulbet.jpeg',
            ],
            [
                'transaksi_id'=>2,
                'gateaways_id'=>2,
                'status'=>'checked',
                'bukti_tf'=>'kulbet.jpeg',
            ],
            [
                'transaksi_id'=>3,
                'gateaways_id'=>3,
                'status'=>'checked',
                'bukti_tf'=>'kulbet.jpeg',
            ],
            ];
            pembayaran::insert($pembayaran);
    }
}
