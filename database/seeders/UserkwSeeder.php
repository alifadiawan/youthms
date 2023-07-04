<?php

namespace Database\Seeders;

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
                'username' => 'ilham',
                'password' => bcrypt('123'),
                'email' => 'ilhxm@gmail.com',
                'role_id' => '1',
            ],
        ];
        
        User::insert($kw);
    }
}
