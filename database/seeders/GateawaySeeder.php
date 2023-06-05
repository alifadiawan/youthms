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
            [
                'image'=>'',
                'nama_gateaway'=>'mandiri',
                'nomor_rekening'=>'',
                'nomor_va'=>'',
            ],
            [
                'image'=>'',
                'nama_gateaway'=>'bri',
                'nomor_rekening'=>'',
                'nomor_va'=>'',
            ],
            [
                'image'=>'',
                'nama_gateaway'=>'btpn',
                'nomor_rekening'=>'',
                'nomor_va'=>'',
            ],
            [
                'image'=>'',
                'nama_gateaway'=>'bca',
                'nomor_rekening'=>'',
                'nomor_va'=>'',
            ],
        ];

        gateaway::insert($gateaways);
    }
}
