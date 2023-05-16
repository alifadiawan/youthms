<?php

namespace Database\Seeders;

use GuzzleHttp\Client;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Member;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $member = [
            [
                'id_member' => "000111",
                'name' => "Steven Alden",
                'nik' => "102021023910",
                'no_hp' =>"0857123123",
                'alamat' => "Indonesia",
                'user_id' => '1'
            ],
            [
                'id_member' => "000112",
                'name' => "Alif Adiawan",
                'nik' => "102021023911",
                'no_hp' =>"0857123123",
                'alamat' => "Indonesia",
                'user_id' => '2'
            ],
            [
                'id_member' => "000113",
                'name' => "Ilham Bintang",
                'nik' => "102021023912",
                'no_hp' =>"0857123123",
                'alamat' => "Indonesia",
                'user_id' => '3'
            ],

        ];
        member::insert($member);
    }
}
