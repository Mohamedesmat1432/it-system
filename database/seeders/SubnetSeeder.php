<?php

namespace Database\Seeders;

use App\Models\Subnet;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubnetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subnets = [
            '255.255.255.0/24',
        ];

        foreach ($subnets as $subnet) {
            Subnet::create([
                'name' => $subnet,
            ]);
        }
    }
}
