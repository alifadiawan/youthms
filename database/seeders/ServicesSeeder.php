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
        $id = 'id_service';
        $judul = 'judul';
        $jenis = 'jenis_layanan_id';
        $desk = 'deskripsi';
        $foto = 'foto';

        $desain =
            [
                [
                    $id => '0001',
                    $judul => 'ui',
                    $jenis => '1',
                    $desk => 'lorem ipsum dolor sit amet',
                    $foto => 'service-example1.png'
                ],
                [
                    $id => '0002',
                    $judul => 'ux',
                    $jenis => '1',
                    $desk => 'lorem ipsum dolor sit amet',
                    $foto => 'service-example2.png'
                ],
                [
                    $id => '0003',
                    $judul => 'poster',
                    $jenis => '1',
                    $desk => 'lorem ipsum dolor sit amet',
                    $foto => 'service-example3.png'
                ]
            ];

        $aplikasi =
            [
                [
                    $id => '0004',
                    $judul => 'website',
                    $jenis => '2',
                    $desk => 'lorem ipsum dolor sit amet',
                    $foto => 'service-example4.png'
                ],
                [
                    $id => '0005',
                    $judul => 'mobile ',
                    $jenis => '2',
                    $desk => 'lorem ipsum dolor sit amet',
                    $foto => 'service-example5.png'
                ],
                [
                    $id => '0006',
                    $judul => 'desktop ',
                    $jenis => '2',
                    $desk => 'lorem ipsum dolor sit amet',
                    $foto => 'service-example6.png'
                ]

            ];

        Services::insert($desain);
        Services::insert($aplikasi);
    }
}
