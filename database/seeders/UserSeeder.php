<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

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
            ['username' => 'ilhmstxr',  'role_id' => '1', 'password' => bcrypt('12345678'), 'email' => 'ilhxm@gmail.com']
        ];

        User::insert($users);
    }
}
