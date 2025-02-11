<?php

namespace Database\Seeders;

use App\Models\Rack;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $racks = [
            'Rack1',
            'Rack2',
            'Rack3',
            'Rack4',
            'Rack5',
            'Rack6',
        ];

        foreach ($racks as $rack) {
            Rack::create([
                'name' => $rack,
            ]);
        }
    }
}
