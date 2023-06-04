<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Segmen;

class SegmenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $segmen = [
            [
                'segmen' => 'DESIGN'
            ],
            [
                'segmen' => 'EDITIN'
            ],
            [
                'segmen' => 'PEMROGRAMMAN'
            ],
        ];
        segmen::insert($segmen);
    }
}
