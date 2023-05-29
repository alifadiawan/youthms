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
                // 'tanggal' =>   Carbon::parse('2023-04-20'),
                'unique_code' =>'YMS0000001',
                'total' => 293039,
                'total_bayar' => 400000,
                'member_id' => 2,
            ],
            [
                // 'tanggal' =>   Carbon::parse('2023-05-20'),
                'unique_code' =>'YMS0000002',
                'total' => 2847146,
                'total_bayar' => 2847146,
                'member_id' => 2,
            ],
            [
                // 'tanggal' =>   Carbon::parse('2023-06-20'),
                'unique_code' =>'YMS0000003',
                'total' => 1645020,
                'total_bayar' => 100000,
                'member_id' => 2,
            ],
            [
                // 'tanggal' =>   Carbon::parse('2023-06-21'),
                'unique_code' =>'YMS0000004',
                'total' => 382950,
                'total_bayar' => 0,
                'member_id' => 2,
            ],
            [
                'unique_code' => 'YMS5611394',
                'total' => 318570,
                'total_bayar' => 0,
                'date_expired' => null,
                'member_id' => 2,
            ],
            [
                'unique_code' => 'YMS7553512',
                'total' => 342989,
                'total_bayar' => 0,
                'date_expired' => null,
                'member_id' => 2,
            ],

        ];

        transaksi::insert($transaksi);
    }
}
