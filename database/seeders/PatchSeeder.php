<?php

namespace Database\Seeders;

use App\Models\Patch;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PatchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $racks = ['R1', 'R2', 'R3', 'R4', 'R5', 'R6'];

        $chars = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'Z'];

        foreach ($racks as $rack) {
            foreach ($chars as $char) {
                foreach (range(1, 24) as $port) {
                    Patch::create([
                        'port' => $rack . $char . $port,
                    ]);
                }
            }
        }
    }
}
