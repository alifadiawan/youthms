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
                'tanggal_transaksi' =>   Carbon::parse('2023-07-4'),
                'unique_code' => 'YMS0000001',
                'total' => 293039,
                'total_bayar' => 293039,
                'member_id' =>1,
                'created_at' => Carbon::parse('2023-7-4')
            ],
            [
                'tanggal_transaksi' =>   Carbon::parse('2023-07-3'),
                'unique_code' => 'YMS0000002',
                'total' => 2847146,
                'total_bayar' => 2847146,
                'member_id' => 1,
                'created_at' => Carbon::parse('2023-7-3')
            ],
            [
                'tanggal_transaksi' =>   Carbon::parse('2023-07-2'),
                'unique_code' => 'YMS0000003',
                'total' => 1645020,
                'total_bayar' => 1645020,
                'member_id' => 1,
                'created_at' => Carbon::parse('2023-7-1')
            ],
            [
                'tanggal_transaksi' =>   Carbon::parse('2023-07-6'),
                'unique_code' => 'YMS0000004',
                'total' => 382950,
                'total_bayar' => 0,
                'member_id' => 1,
                'created_at' => Carbon::parse('2023-7-6')
            ],
            [
                'tanggal_transaksi' =>   Carbon::parse('2023-6-2'),
                'unique_code' => 'YMS5611394',
                'total' => 318570,
                'total_bayar' => 0,
                'member_id' => 1,
                'created_at' => Carbon::parse('2023-6-2')
            ],
            [
                'tanggal_transaksi' =>   Carbon::parse('2023-6-1'),
                'unique_code' => 'YMS7553512',
                'total' => 342989,
                'total_bayar' => 0,
                'member_id' => 1,
                'created_at' => Carbon::parse('2023-6-1')
            ],
            [
                'tanggal_transaksi' =>   Carbon::parse('2023-5-12'),
                'unique_code' => 'YMS5662173',
                'total' => 738149,
                'total_bayar' => 0,
                'member_id' => 1,
                'created_at' => Carbon::parse('2023-5-12')
            ],
            [
                'tanggal_transaksi' =>   Carbon::parse('2023-5-13'),
                'unique_code' => 'YMS5662173',
                'total' => 738149,
                'total_bayar' => 0,
                'member_id' => 1,
                'created_at' => Carbon::parse('2023-5-13')
            ],
            [
                'tanggal_transaksi' =>   Carbon::parse('2023-5-14'),
                'unique_code' => 'YMS5662173',
                'total' => 738149,
                'total_bayar' => 0,
                'member_id' => 1,
                'created_at' => Carbon::parse('2023-5-14')
            ],
            [
                'tanggal_transaksi' =>   Carbon::parse('2023-8-14'),
                'unique_code' => 'YMS5662173',
                'total' => 738149,
                'total_bayar' => 0,
                'member_id' => 1,
                'created_at' => Carbon::parse('2023-8-14')
            ],
            [
                'tanggal_transaksi' =>   Carbon::parse('2023-8-14'),
                'unique_code' => 'YMS5662173',
                'total' => 738149,
                'total_bayar' => 0,
                'member_id' => 1,
                'created_at' => Carbon::parse('2023-8-14')
            ],
            [
                'tanggal_transaksi' =>   Carbon::parse('2023-8-14'),
                'unique_code' => 'YMS5662173',
                'total' => 738149,
                'total_bayar' => 0,
                'member_id' => 1,
                'created_at' => Carbon::parse('2023-8-14')
            ],
            [
                'tanggal_transaksi' =>   Carbon::parse('2023-8-14'),
                'unique_code' => 'YMS5662173',
                'total' => 738149,
                'total_bayar' => 0,
                'member_id' => 1,
                'created_at' => Carbon::parse('2023-8-14')
            ],
            [
                'tanggal_transaksi' =>   Carbon::parse('2023-8-14'),
                'unique_code' => 'YMS5662173',
                'total' => 738149,
                'total_bayar' => 0,
                'member_id' => 1,
                'created_at' => Carbon::parse('2023-8-14')
            ],
            [
                'tanggal_transaksi' =>   Carbon::parse('2023-9-14'),
                'unique_code' => 'YMS5662173',
                'total' => 738149,
                'total_bayar' => 0,
                'member_id' => 1,
                'created_at' => Carbon::parse('2023-9-14')
            ],
            [
                'tanggal_transaksi' =>   Carbon::parse('2023-9-14'),
                'unique_code' => 'YMS5662173',
                'total' => 738149,
                'total_bayar' => 0,
                'member_id' => 1,
                'created_at' => Carbon::parse('2023-9-14')
            ],
            [
                'tanggal_transaksi' =>   Carbon::parse('2023-9-14'),
                'unique_code' => 'YMS5662173',
                'total' => 738149,
                'total_bayar' => 0,
                'member_id' => 1,
                'created_at' => Carbon::parse('2023-9-14')
            ],
            [
                'tanggal_transaksi' =>   Carbon::parse('2023-9-14'),
                'unique_code' => 'YMS5662173',
                'total' => 738149,
                'total_bayar' => 0,
                'member_id' => 1,
                'created_at' => Carbon::parse('2023-9-14')
            ],

        ];

        transaksi::insert($transaksi);
    }
}
