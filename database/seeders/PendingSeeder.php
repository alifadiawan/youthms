<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\request_user;
use Illuminate\Support\Carbon;

class PendingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pending = [
            [
                'nama_pemesan' => 'ilham',
                'deskripsi' => null,
                'status' => 'accept',
                'tanggal_mulai' => Carbon::parse('2023-06-21'),
                'jatuh_tempo' => Carbon::parse('2023-06-30'),
                'transaksi_id' => 3,
            ],
            [
                'nama_pemesan' => 'ilham',
                'deskripsi' => null,
                'status' => null,
                'tanggal_mulai' => Carbon::parse('2023-06-21'),
                'jatuh_tempo' => Carbon::parse('2023-06-30'),
                'transaksi_id' => 5,
            ],
            [
                'nama_pemesan' => 'ilham',
                'deskripsi' => null,
                'status' => 'accept',
                'tanggal_mulai' => Carbon::parse('2023-06-21'),
                'jatuh_tempo' => Carbon::parse('2023-06-30'),
                'transaksi_id' => 6,
            ],
            [
                'nama_pemesan' => 'ilham',
                'deskripsi' => null,
                'status' => 'declined',
                'tanggal_mulai' => Carbon::parse('2023-06-21'),
                'jatuh_tempo' => Carbon::parse('2023-06-30'),
                'transaksi_id' => 7,
            ],
        ];

        request_user::insert($pending);
    }
}
