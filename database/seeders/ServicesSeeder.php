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


        $aplikasi =
            [
                [
                    $id => '0001',
                    $judul => 'website',
                    $jenis => '1',
                    $desk => 'lorem ipsum dolor sit amet',
                    $foto => 'service-example4.png'
                ],
                [
                    $id => '0002',
                    $judul => 'mobile ',
                    $jenis => '1',
                    $desk => 'lorem ipsum dolor sit amet',
                    $foto => 'service-example5.png'
                ],
                [
                    $id => '0003',
                    $judul => 'desktop ',
                    $jenis => '1',
                    $desk => 'lorem ipsum dolor sit amet',
                    $foto => 'service-example6.png'
                ]

            ];


        $marketing = 
            [
                [
                    $id => '0004',
                    $judul => 'social media',
                    $jenis => '2',
                    $desk => 'lorem ipsum dolor sit amet',
                    $foto => 'service-example3.png'
                ],

            ];

        $desain =
            [
                [
                    $id => '0005',
                    $judul => 'ui',
                    $jenis => '3',
                    $desk => 'lorem ipsum dolor sit amet',
                    $foto => 'service-example1.png'
                ],
                [
                    $id => '0006',
                    $judul => 'ux',
                    $jenis => '3',
                    $desk => 'lorem ipsum dolor sit amet',
                    $foto => 'service-example2.png'
                ],
                [
                    $id => '0007',
                    $judul => 'designing',
                    $jenis => '3',
                    $desk => 'lorem ipsum dolor sit amet',
                    $foto => 'service-example3.png'
                ],
                [
                    $id => '0008',
                    $judul => 'pencetakan',
                    $jenis => '3',
                    $desk => 'lorem ipsum dolor sit amet',
                    $foto => 'service-example3.png'
                ],
            ];

        $editing = 
            [
                [
                    $id => '0009',
                    $judul => 'word',
                    $jenis => '4',
                    $desk => 'lorem ipsum dolor sit amet',
                    $foto => 'service-example3.png'
                ],

                [
                    $id => '0010',
                    $judul => 'powerpoint',
                    $jenis => '4',
                    $desk => 'lorem ipsum dolor sit amet',
                    $foto => 'service-example3.png'
                ],
                [
                    $id => '0011',
                    $judul => 'buku',
                    $jenis => '4',
                    $desk => 'lorem ipsum dolor sit amet',
                    $foto => 'service-example3.png'
                ],
                [
                    $id => '0012',
                    $judul => 'surat',
                    $jenis => '4',
                    $desk => 'lorem ipsum dolor sit amet',
                    $foto => 'service-example3.png'
                ],
                [
                    $id => '0013',
                    $judul => 'pengecekan',
                    $jenis => '4',
                    $desk => 'lorem ipsum dolor sit amet',
                    $foto => 'service-example3.png'
                ],
                [
                    $id => '0014',
                    $judul => 'pengetikan',
                    $jenis => '4',
                    $desk => 'lorem ipsum dolor sit amet',
                    $foto => 'service-example3.png'
                ],
            ];

        Services::insert($aplikasi);
        Services::insert($marketing);
        Services::insert($desain);
        Services::insert($editing);
    }
}
