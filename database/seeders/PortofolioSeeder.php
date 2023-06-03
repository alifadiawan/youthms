<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Portofolio;
use App\Models\PortofolioPic;

class PortofolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $portofolio = [
            [
                'project' => 'Muslim Football Sidoarjo',
                'deskripsi' => 'lorem ipsum dolor sit amet',
                'cover' => '1684503801_jason-goodman-zSpGWzwRFas-unsplash.jpg',
                'services_id' => '4'
            ],
        ];

        $pics = [
            [
                'foto' => '1684507299_1.jpg',
                'portofolio_id' => '1',
            ],
            [
                'foto' => '1684507327_33.jpg',
                'portofolio_id' => '1',
            ],
            [
                'foto' => '1684507327_84303.jpg',
                'portofolio_id' => '1',
            ],
            [
                'foto' => '1684574531_1.jpg',
                'portofolio_id' => '1',
            ],
            [
                'foto' => '1684574546_84303.jpg',
                'portofolio_id' => '1',
            ],
        ];

        Portofolio::insert($portofolio);
        PortofolioPic::insert($pics);
    }
}
