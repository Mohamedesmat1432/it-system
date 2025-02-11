<?php

namespace Database\Seeders;

use App\Models\Telephone;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TelephoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $telephones = [
            'Cisco مميز',
            'Cisco عادي',
            'Panasonic',
            'بدون تليفون',
        ];

        foreach ($telephones as $telephone) {
            Telephone::create([
                'name' => $telephone,
            ]);
        }
    }
}
