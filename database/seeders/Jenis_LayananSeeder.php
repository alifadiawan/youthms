<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\JenisLayanan;

class Jenis_LayananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jenis = [
            [
                'layanan' => 'desain'
            ],
            [
                'layanan' => 'aplikasi'
            ],
            [
                'layanan' => 'editing'
            ]
        ];

        JenisLayanan::insert($jenis);
    }
}
