<?php

namespace Database\Seeders;

use App\Models\visitor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class VisitorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $visitor = [
            [
                'ip_address' => '127.0.0.2',
                'visits' => 3,
                'created_at' => Carbon::yesterday()
            ],
            [
                'ip_address' => '127.2.0.2',
                'visits' => 3,
                'created_at' => Carbon::yesterday()
            ],
            [
                'ip_address' => '127.0.0.1',
                'visits' => 3,
                'created_at' => today()
            ],
            [
                'ip_address' => '127.0.4.3',
                'visits' => 3,
                'created_at' => today()
            ],
            [
                'ip_address' => '127.0.0.8',
                'visits' => 3,
                'created_at' => Carbon::tomorrow()
            ],
            [
                'ip_address' => '127.0.0.3',
                'visits' => 3,
                'created_at' => Carbon::tomorrow()
            ],
            [
                'ip_address' => '127.0.2.3',
                'visits' => 3,
                'created_at' => Carbon::tomorrow()
            ],
            [
                'ip_address' => '127.0.7.3',
                'visits' => 3,
                'created_at' => Carbon::tomorrow()
            ],
        ];

        visitor::insert($visitor);

    }
}
