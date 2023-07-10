<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Carbon;
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
                'bank_id'=>null,
                'ewallet_id'=>1,
                'status'=>'checked',
                'total_bayar'=>null,
                'bukti_tf'=>'kulbet.jpeg',
                'created_at' => Carbon::parse('2023-06-6'),
            ],
            [
                'transaksi_id'=>2,
                'bank_id'=>null,
                'ewallet_id'=>2,
                'status'=>'checked',
                'total_bayar'=>null,
                'bukti_tf'=>'kulbet.jpeg',
                'created_at' => Carbon::parse('2023-06-6'),
            ],
            [
                'transaksi_id'=>3,
                'bank_id'=>null,
                'ewallet_id'=>3,
                'status'=>'checked',
                'total_bayar'=>null,
                'bukti_tf'=>'kulbet.jpeg',
                'created_at' => Carbon::parse('2023-06-6'),
            ],
            [
                'transaksi_id'=>8,
                'bank_id'=>null,
                'ewallet_id'=>3,
                'status'=>'checking',
                'total_bayar'=>null,
                'bukti_tf'=>'kulbet.jpeg',
                'created_at' => Carbon::parse('2023-06-6'),
            ],
            [
                'transaksi_id'=>9,
                'bank_id'=>2,
                'ewallet_id'=>null,
                'status'=>'checking',
                'total_bayar'=>null,
                'bukti_tf'=>'kulbet.jpeg',
                'created_at' => Carbon::parse('2023-06-6'),
            ],
            ];
            pembayaran::insert($pembayaran);
    }
}
