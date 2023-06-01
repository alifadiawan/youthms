<?php

namespace Database\Seeders;

use App\Models\termin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class TerminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $termin = [
            [
                'tanggal' => Carbon::parse('2023-06-21'),
                'requser_id' => 1,
                'harga' => 600000,
                'image' => 'example',
            ],
            [
                'tanggal' => Carbon::parse('2023-06-21'),
                'requser_id' => 1,
                'harga' => 500000,
                'image' => 'example',
            ],
            [
                'tanggal' => Carbon::parse('2023-06-21'),
                'requser_id' => 1,
                'harga' => 545020,
                'image' => 'example',
            ]
        ];
        termin::insert($termin);
    }
}
