<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ServicesIlls;

class ServicesIllsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ServicesIlls::create([
            'hero_ills' => 'service-ills.png',
            'hero_text' => 'YouthMS memiliki 3 jenis layanan yang bergerak dibidang Aplikasi, Desain, dan Editing',
            'ills1' => 'service-ills1.png',
            'ills2' => 'service-ills2.png',
            'ills3' => 'service-ills3.png',
        ]);
    }
}
