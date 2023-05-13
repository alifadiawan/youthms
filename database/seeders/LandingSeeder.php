<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\LandingText;
use App\Models\LandingData;
use App\Models\LandingIllustration;
use App\Models\LandingPartner;
use Illuminate\Database\Seeder;

class LandingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        landingText::create([
            'mainline' => 'Gather more customers in your businees area',
            'secondline' => 'Kami youthms.id menyediakan blablablabla'
        ]);

        LandingData::create([
            'foto' => 'coba-testi.png',
            'nama' => 'Steven Alden',
            'jabatan' => 'Direktur Perusahaan',
            'review' => 'jadi youthms.id ini blablablabla',
        ]);

        LandingIllustration::create([
            'illustration' => 'Glowillustration.png',
        ]);

        $partner = [
            ['partner' => 'partner1.png'],
            ['partner' => 'partner2.png'],
            ['partner' => 'partner3.png'],
            ['partner' => 'partner4.png'],
        ];

        LandingPartner::insert($partner);

    }
}
