<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $role = [
            [
                'role' => 'admin'
            ],
            [
                'role' => 'client'
            ],
            [
                'role' => 'owner'
            ],
            [
                'role' => 'programmer'
            ],
            [
                'role' => 'ui/ux'
            ],
            [
                'role' => 'sekretariat'
            ],
            [
                'role' => 'reborn'
            ],
            [
                'role' => 'keluarga_besar'
            ],
            [
                'role' => 'tim_kreatif'
            ],
            [
                'role' => 'desainer'
            ],
        ];

        role::insert($role);
    }
}
