<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Member;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        $users = [
            ['username' => 'Stevana1304',  'role_id' => '1', 'password' => bcrypt('12345678'), 'email' => 'steven@gmail.com'],
            ['username' => 'alif_adiawan',  'role_id' => '1', 'password' => bcrypt('12345678'), 'email' => 'alif@gmail.com'],
            ['username' => 'ilhmstxr',  'role_id' => '1', 'password' => bcrypt('123'), 'email' => 'ilhxm@gmail.com'],
            ['username' => 'client',  'role_id' => '2', 'password' => bcrypt('123'), 'email' => 'client@gmail.com'],
            ['username' => 'clientacumalaka',  'role_id' => '2', 'password' => bcrypt('123'), 'email' => 'client2@gmail.com'],
            ['username' => 'owner',  'role_id' => '3', 'password' => bcrypt('123'), 'email' => 'owner@gmail.com'],
            ['username' => 'programmer',  'role_id' => '4', 'password' => bcrypt('123'), 'email' => 'programmer@gmail.com'],
            ['username' => 'uiux',  'role_id' => '5', 'password' => bcrypt('123'), 'email' => 'uiux@gmail.com'],
            ['username' => 'sekretariat',  'role_id' => '6', 'password' => bcrypt('123'), 'email' => 'sekretariat@gmail.com'],
            ['username' => 'reborn',  'role_id' => '7', 'password' => bcrypt('123'), 'email' => 'reborn@gmail.com'],
        ];

        $member = [
            ['id_member'=>"0004",'name'=>'si paling klien','nik'=>36780413213,'no_hp'=>"08572312",'alamat'=>"indo",'user_id'=>"0004",],
            ['id_member'=>"007",'name'=>'si paling bukan klien','nik'=>36783213213,'no_hp'=>"0857232312",'alamat'=>"maag",'user_id'=>"0005",]
        ];
        
        User::insert($users);
        member::insert($member);
    }
}
