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
            'secondline' => 'YouthMS.id is a start up company that focus on creating website, design, and editing correspondence.',
            'thirdline' => 'We Will Help You to Expand Your Business'
        ]);

        LandingData::create([
            'foto' => 'partner3.png',
            'nama' => 'Steven Alden',
            'jabatan' => 'Direktur Perusahaan',
            'review' => 'jadi youthms.id ini blablablabla',
        ]);

        LandingIllustration::create([
            'illustration' => 'group-404.png',
        ]);

        $partner = [
            ['partner' => 'partner3.png'],
            ['partner' => 'partner3.png'],
            ['partner' => 'partner3.png'],
            ['partner' => 'partner4.png'],
        ];

        LandingPartner::insert($partner);

    }
}
