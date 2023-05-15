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
                'id_member' => 1,
                'name' => "suparjo",
                'email' => "suparjo@weewoo.com",
                'no_hp' =>"0857123123",
                // contoh role

                // client
                // customer
                
                'user_id' => '2'
            ],
            [
                'id_member' => 2,
                'name' => "soeharti",
                'email' => "soeharti@weewoo.com",
                'no_hp' =>"0712783",
                // contoh role

                // client
                // customer
                'user_id' => '2'
            ],
            [
                'id_member' => 3,
                'name' => "gus",
                'email' => "gus@weewoo.com",
                'no_hp' =>"0712783",
                // contoh role

                // client
                // customer
                'user_id' => '2'
            ],

        ];
        member::insert($member);
    }
}
