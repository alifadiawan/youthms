<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PortoIlls;

class PortoIllsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PortoIlls::create([
            'text_head' => 'Some of Our Amazing Projects',
            'text_body' => 'Because actions speak louder than words, we help you build better software today for your better tomorrow. When you choose Youthms to develop and service your software, you are joining hundreds of satisfied clients and market leader',
            'foto' => 'porto-ilustrasi.png'
        ]);
    }
}
