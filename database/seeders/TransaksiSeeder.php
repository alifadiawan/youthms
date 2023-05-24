<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Transaksi;
use Illuminate\Support\Carbon;

class TransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $transaksi = [

            [
                'tanggal' =>   Carbon::parse('2023-04-20'),
                'total' => 420000,
                'total_bayar' => 500000,
                'member_id' => 1,
            ],
            [
                'tanggal' =>   Carbon::parse('2023-04-20'),
                'total' => 690000,
                'total_bayar' => 690000,
                'member_id' => 1,
            ],
            [
                'tanggal' =>   Carbon::parse('2023-04-20'),
                'total' => 690000,
                'total_bayar' => 420000,
                'member_id' => 1,
            ],
            [
                'tanggal' =>   Carbon::parse('2023-04-20'),
                'total' => 690000,
                'total_bayar' => 0,
                'member_id' => 1,
            ],

        ];

        transaksi::insert($transaksi);
    }
}
