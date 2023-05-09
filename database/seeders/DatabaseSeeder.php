<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Jabatan;
use App\Models\LandingText;
use App\Models\LandingData;
use App\Models\LandingIllustration;
use App\Models\LandingPartner;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

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
            ['partner' => 'partner1.png'],
            ['partner' => 'partner1.png'],
            ['partner' => 'partner1.png'],
        ];

        LandingPartner::insert($partner);

        $jabatan = ['jabatan' => 'admin'];
        $users = [
            ['name' => 'Steven Alden', 'username' => 'Stevana1304', 'no_hp' => '08123456', 'jabatan_id' => '1', 'password' => bcrypt('12345678'), 'email' => 'steven@gmail.com'],
            ['name' => 'Alif Adiawan', 'username' => 'alif_adiawan', 'no_hp' => '08123456', 'jabatan_id' => '1', 'password' => bcrypt('12345678'), 'email' => 'alif@gmail.com']
        ];
        
        Jabatan::insert($jabatan);
        User::insert($users);    
        
    }
}
