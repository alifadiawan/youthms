<?php

namespace Database\Seeders;

use App\Models\Member;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserkwSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $kw = [
            [
                'username' => 'ilhxm',
                'password' => bcrypt('123'),
                'email' => 'ilhxm@gmail.com',
                'role_id' => '1',
            ],
        ];

        $member = [
            [
                'id_member' => "000113",
                'name' => "Ilham starss",
                'nik' => "102021023912",
                'no_hp' =>"0857123123",
                'alamat' => "Indonesia",
                'user_id' => '25'
            ],
        ];

        User::insert($kw);
        Member::insert($member);
    }
}
