<?php

namespace Database\Seeders;

use App\Models\bank;
use App\Models\ewallet;
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
        // $gateaways = [
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

        $bank = [
            [
                'image' => '',
                'nama' => 'jenius',
                'penerima' => 'Hafiyyan Faza Santoso',
                'nomor_rekening' => '90130151561',
            ],
            [
                'image' => '',
                'nama' => 'bsi',
                'penerima' => 'Hafiyyan Faza Santoso',
                'nomor_rekening' => '7206472841',
            ]
        ];

        $ewallet = [

            [
                'image' => '',
                'nama' => 'link aja',
                'penerima' => 'Hafiyyan Faza Santoso',
                'nomor_hp' => '081933596386',
            ],
            [
                'image' => 'sopipay.png',
                'nama' => 'shoppee pay',
                'penerima' => 'Hafiyyan Faza Santoso',
                'nomor_hp' => '081933596386',
            ],
            [
                'image' => 'gopay.png',
                'nama' => 'gopay',
                'penerima' => 'Hafiyyan Faza Santoso',
                'nomor_hp' => '081933596386',
            ],
        ];

        bank::insert($bank);
        ewallet::insert($ewallet);
    }
}
