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
                'layanan' => 'aplikasi',
                'deskripsi' => 'Aplikasi merupakan salah satu tempat untuk memasrkan produk/jasa anda secara online. YouthMS memiliki 2 layanan dalam bidang aplikasi',
                'link_illus' => 'https://assets10.lottiefiles.com/private_files/lf30_zSGy1w.json',
            ],
            // [
            //     'layanan' => 'digital marketing',
            //     'deskripsi' => 'Untuk para pedagang online maupun offline, desain merupakan salah satu hal penting untuk menarik pembeli. Di youthMS kami memiliki beberapa layanan yang dapat digunakan untuk membantu meningkatkan upaya penjualan',
            //     'link_illus' => 'https://assets1.lottiefiles.com/packages/lf20_zy3citkh.json',
            // ],
            [
                'layanan' => 'desain grafis',
                'deskripsi' => 'Untuk para pedagang online maupun offline, desain merupakan salah satu hal penting untuk menarik pembeli. Di youthMS kami memiliki beberapa layanan yang dapat digunakan untuk membantu meningkatkan upaya penjualan',
                'link_illus' => 'https://assets1.lottiefiles.com/packages/lf20_zy3citkh.json',
            ],
            [
                'layanan' => 'editing',
                'deskripsi' => 'Penyunting buku dalam arti sempit adalah orang yang bertugas melakukan penyuntingan naskah. Penyuntingan naskah adalah proses, cara, atau perbuatan menyunting naskah',
                'link_illus' => 'https://assets10.lottiefiles.com/packages/lf20_hgwne4xq.json',
            ],
        ];

        JenisLayanan::insert($jenis);
    }
}
