<?php

namespace Database\Seeders;

use App\Models\Ip;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (range(1, 255) as $ip) {
            Ip::create([
                'number' => '10.0.0.' . $ip,
            ]);
        }

        foreach (range(1, 255) as $ip) {
            Ip::create([
                'number' => '10.1.201.' . $ip,
            ]);
        }

        foreach (range(1, 255) as $ip) {
            Ip::create([
                'number' => '10.1.202.' . $ip,
            ]);
        }

        foreach (range(1, 255) as $ip) {
            Ip::create([
                'number' => '10.1.205.' . $ip,
            ]);
        }

        foreach (range(1, 255) as $ip) {
            Ip::create([
                'number' => '10.0.10.' . $ip,
            ]);
        }
    }
}
