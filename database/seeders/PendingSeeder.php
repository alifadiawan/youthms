<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\request_user;

class PendingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pending = [
            [
            'nama_pemesan' =>'ilham',  
            'deskripsi' =>null,  
            'status' =>null,  
            'tanggal_mulai' =>Carbon::parse('2023-06-21'),  
            'jatuh_tempo' =>Carbon::parse('2023-06-21'),  
            'transaksi_id' =>,  
        ],
            [
            'nama_pemesan' =>'ilham',  
            'deskripsi' =>null,  
            'status' =>'accept',  
            'tanggal_mulai' =>Carbon::parse('2023-06-21'),  
            'jatuh_tempo' =>Carbon::parse('2023-06-21'),  
            'transaksi_id' =>,  
        ],
            [
            'nama_pemesan' =>'ilham',  
            'deskripsi' =>null,  
            'status' =>'decline',  
            'tanggal_mulai' =>Carbon::parse('2023-06-21'),  
            'jatuh_tempo' =>Carbon::parse('2023-06-21'),  
            'transaksi_id' =>,  
        ],
        ];

        request_user::insert($pending);

    }
}
