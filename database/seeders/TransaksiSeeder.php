<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Transaksi;
use App\Models\TransaksiDetail;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

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
                'total' => 293039,
                'total_bayar' => 400000,
                'member_id' => 2,
            ],
            [
                'tanggal' =>   Carbon::parse('2023-04-20'),
                'total' => 2847146,
                'total_bayar' => 2847146,
                'member_id' => 2,
            ],
            [
                'tanggal' =>   Carbon::parse('2023-04-20'),
                'total' => 1645020,
                'total_bayar' => 100000,
                'member_id' => 2,
            ],
            [
                'tanggal' =>   Carbon::parse('2023-04-20'),
                'total' => 382950,
                'total_bayar' => 0,
                'member_id' => 2,
            ],

        ];

        transaksi::insert($transaksi);
    }
}
