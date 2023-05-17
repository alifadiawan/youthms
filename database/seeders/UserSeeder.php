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
            ['username' => 'ilhmstxr',  'role_id' => '1', 'password' => bcrypt('123'), 'email' => 'ilhxm@gmail.com'],
            ['username' => 'client',  'role_id' => '2', 'password' => bcrypt('123'), 'email' => 'client@gmail.com']
        ];

        User::insert($users);
    }
}
