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
                'segmen' => 'design'
            ],
            [
                'segmen' => 'marketing'
            ],
            [
                'segmen' => 'pemrograman'
            ],
        ];
        segmen::insert($segmen);
    }
}
