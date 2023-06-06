<?php

namespace Database\Seeders;

use App\Models\gateaway;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GateawaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $gateaways = [
            // [
            //     'image'=>'',
            //     'nama_gateaway'=>'mandiri',
            //     'nomor_rekening'=>'',
            //     'nomor_va'=>'',
            // ],
            // [
            //     'image'=>'',
            //     'nama_gateaway'=>'bri',
            //     'nomor_rekening'=>'',
            //     'nomor_va'=>'',
            // ],
            // [
            //     'image'=>'',
            //     'nama_gateaway'=>'btpn',
            //     'nomor_rekening'=>'',
            //     'nomor_va'=>'',
            // ],
            // [
            //     'image'=>'',
            //     'nama_gateaway'=>'bca',
            //     'nomor_rekening'=>'',
            //     'nomor_va'=>'',
            // ],
            [
                'image'=>'jenius.png',
                'nama_gateaway'=>'Jenius',
                'atas_nama'=>'Hafiyyan Faza Santoso',
                'nomor_rekening'=>'90130151561',
            ],
            [
                'image'=>'bsi.png',
                'nama_gateaway'=>'Bank BSI',
                'atas_nama'=>'Hafiyyan Faza Santoso',
                'nomor_rekening'=>'7206472841',
            ],
            [
                'image'=>'link.png',
                'nama_gateaway'=>'Link Aja',
                'atas_nama'=>'Hafiyyan Faza Santoso',
                'nomor_rekening'=>'081933596386',
            ],
            [
                'image'=>'sopipay.png',
                'nama_gateaway'=>'ShopeePay',
                'atas_nama'=>'Hafiyyan Faza Santoso',
                'nomor_rekening'=>'081933596386',
            ],
            [
                'image'=>'gopay.png',
                'nama_gateaway'=>'GoPay',
                'atas_nama'=>'Hafiyyan Faza Santoso',
                'nomor_rekening'=>'081933596386',
            ],
        ];

        gateaway::insert($gateaways);
    }
}
