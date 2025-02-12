<?php

namespace Database\Seeders;

use App\Models\SwitchData;
use App\Models\SwitchName;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SwitchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $switchData = [
            ['F5_R1_SW1', '10.2.100.51', 'F!xed@2oo7[F5_R1_SW1]', 'F!xed@2oo7[F5_R1_SW1]En@ble'],
            ['F5_R1_SW2', '10.2.100.52', 'F!xed@2oo7[F5_R1_SW2]', 'F!xed@2oo7[F5_R1_SW2]En@ble'],
            ['F5_R1_SW3', '10.2.100.53', 'F!xed@2oo7[F5_R1_SW3]', 'F!xed@2oo7[F5_R1_SW3]En@ble'],
            ['F5_R1_SW4', '10.2.100.54', 'F!xed@2oo7[F5_R1_SW4]', 'F!xed@2oo7[F5_R1_SW4]En@ble'],
            ['F5_R1_SW5', '10.2.100.55', 'F!xed@2oo7[F5_R1_SW5]', 'F!xed@2oo7[F5_R1_SW5]En@ble'],
            ['F5_R2_SW1', '10.2.100.56', 'F!xed@2oo7[F5_R2_SW1]', 'F!xed@2oo7[F5_R2_SW1]En@ble'],
            ['F5_R2_SW2', '10.2.100.57', 'F!xed@2oo7[F5_R2_SW2]', 'F!xed@2oo7[F5_R2_SW2]En@ble'],
            ['F5_R2_SW3', '10.2.100.58', 'F!xed@2oo7[F5_R2_SW3]', 'F!xed@2oo7[F5_R2_SW3]En@ble'],
            ['F5_R2_SW4', '10.2.100.59', 'F!xed@2oo7[F5_R2_SW4]', 'F!xed@2oo7[F5_R2_SW4]En@ble'],
            ['F5_R2_SW5', '10.2.100.60', 'F!xed@2oo7[F5_R2_SW5]', 'F!xed@2oo7[F5_R2_SW5]En@ble'],
            ['F6_R1_SW1', '10.2.100.61', 'F!xed@2oo7[F6_R1_SW1]', 'F!xed@2oo7[F6_R1_SW1]En@ble'],
            ['F6_R1_SW2', '10.2.100.62', 'F!xed@2oo7[F6_R1_SW2]', 'F!xed@2oo7[F6_R1_SW2]En@ble'],
            ['F6_R1_SW3', '10.2.100.66', 'F!xed@2o11[F6_R2_SW2]', 'F!xed@2o11[F6_R2_SW2]En@ble'],
            ['F6_R2_SW1', '10.2.100.64', 'F!xed@2oo7[F6_R2_SW1]', 'F!xed@2oo7[F6_R2_SW1]En@ble'],
            ['F6_R2_SW2', '10.2.100.65', 'F!xed@2oo7[F6_R2_SW2]', 'F!xed@2oo7[F6_R2_SW2]En@ble'],
            ['F6_R2_SW3', '10.2.100.67', 'F!xed@2o12[F6_R2_SW2]', 'F!xed@2o12[F6_R2_SW2]En@ble'],
            ['F6_R2_SW4', '10.2.100.68', 'F!xed@2o13[F6_R2_SW2]', 'F!xed@2o13[F6_R2_SW2]En@ble'],
            ['F6_R2_SW5', '10.2.100.69', 'F!xed@2o14[F6_R2_SW2]', 'F!xed@2o14[F6_R2_SW2]En@ble'],
            ['F6_R2_SW6', '10.2.100.73', 'cisco', 'cisco']
        ];

        foreach ($switchData as $switch) {
            SwitchName::create([
                'name' => $switch[0],
                'ip' => $switch[1],
                'password' => $switch[2],
                'password_enable' => $switch[3],
            ]);
        }

        $switchNameIds = SwitchName::pluck('id')->toArray();

        foreach ($switchNameIds as $id) {
            foreach (range(1, 24) as $port) {
                SwitchData::create([
                    'switch_name_id' => $id,
                    'port' => $port
                ]);
            }
        }
    }
}
