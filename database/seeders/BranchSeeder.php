<?php

namespace Database\Seeders;

use App\Models\Branch;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $branches = [
            'الدقي',
            'عماد الدين',
        ];

        foreach ($branches as $branch) {
            Branch::create([
                'name' => $branch,
            ]);
        }
    }
}
