<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Transaksi;
Use Illuminate\Support\Carbon;

class TransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $transaksi = [
            [
                'tanggal' =>   today(),
                'total' => 90000,
                'total_bayar' => 100000,
                'member_id' => 1,
            ],
            [
                'tanggal' =>   today(),
                'total' => 69000,
                'total_bayar' => 200000,
                'member_id' => 1,
            ],
            [
                'tanggal' =>   today(),
                'total' => 420000,
                'total_bayar' => 500000,
                'member_id' => 1,
            ],
            [
                'tanggal' =>   Carbon::parse('2023-04-20'),
                'total' => 420000,
                'total_bayar' => 500000,
                'member_id' => 1,
            ],

        ];

        transaksi::insert($transaksi);
    }
}
