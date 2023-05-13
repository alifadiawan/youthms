<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Services;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $judul = 'judul';
        $jenis = 'jenis_layanan_id';

        $desain =
            [
                [
                    $judul => 'ui',
                    $jenis => '1'
                ],
                [
                    $judul => 'ux',
                    $jenis => '1'
                ],
                [
                    $judul => 'poster',
                    $jenis => '1'
                ]
            ];

        $aplikasi =
            [
                [
                    $judul => 'website',
                    $jenis => '2'
                ],
                [
                    $judul => 'mobile ',
                    $jenis => '2'
                ],
                [
                    $judul => 'desktop ',
                    $jenis => '2'
                ]

            ];

        Services::insert($desain);
        Services::insert($aplikasi);
    }
}
