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
            ['name' => 'Steven Alden', 'username' => 'Stevana1304', 'no_hp' => '08123456', 'jabatan_id' => '1', 'password' => bcrypt('12345678'), 'email' => 'steven@gmail.com'],
            ['name' => 'Alif Adiawan', 'username' => 'alif_adiawan', 'no_hp' => '08123456', 'jabatan_id' => '1', 'password' => bcrypt('12345678'), 'email' => 'alif@gmail.com'],
            ['name' => 'Ilham Bintang', 'username' => 'ilhmstxr', 'no_hp' => '08123456', 'jabatan_id' => '1', 'password' => bcrypt('12345678'), 'email' => 'ilhxm@gmail.com']
        ];

        User::insert($users);
    }
}
