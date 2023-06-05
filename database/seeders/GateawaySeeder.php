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
                'image'=>'',
                'nama_gateaway'=>'jenius',
                'atas_nama'=>'Hafiyyan Faza Santoso',
                'nomor_rekening'=>'90130151561',
            ],
            [
                'image'=>'',
                'nama_gateaway'=>'bsi',
                'atas_nama'=>'Hafiyyan Faza Santoso',
                'nomor_rekening'=>'7206472841',
            ],
            [
                'image'=>'',
                'nama_gateaway'=>'link aja',
                'atas_nama'=>'Hafiyyan Faza Santoso',
                'nomor_rekening'=>'081933596386',
            ],
            [
                'image'=>'sopipay.png',
                'nama_gateaway'=>'shoppee pay',
                'atas_nama'=>'Hafiyyan Faza Santoso',
                'nomor_rekening'=>'081933596386',
            ],
            [
                'image'=>'gopay.png',
                'nama_gateaway'=>'gopay',
                'atas_nama'=>'Hafiyyan Faza Santoso',
                'nomor_rekening'=>'081933596386',
            ],
        ];

        gateaway::insert($gateaways);
    }
}
