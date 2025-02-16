<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        $department = Department::where('name', 'نظم المعلومات')->first();

        $users = [
            [
                'name' => 'mohamed esmat',
                'email' => 'mesmat@gmail.com',
                'password' => Hash::make('P@ssw0rd'),
                'department_id' => $department->id,
            ],
            [
                'name' => 'ahmed salem',
                'email' => 'asalem@gmail.com',
                'password' => Hash::make('P@ssw0rd'),
                'department_id' => $department->id,
            ],
            [
                'name' => 'hossam khaled',
                'email' => 'hkhaled@gmail.com',
                'password' => Hash::make('P@ssw0rd'),
                'department_id' => $department->id,
            ],
            [
                'name' => 'mohamed negm',
                'email' => 'mnegm@gmail.com',
                'password' => Hash::make('P@ssw0rd'),
                'department_id' => $department->id,
            ],
            [
                'name' => 'saber emam',
                'email' => 'semam@gmail.com',
                'password' => Hash::make('P@ssw0rd'),
                'department_id' => $department->id,
            ]
        ];

        $role = Role::where('name', 'Super Admin')->first();

        foreach ($users as $user) {
            $user = User::create($user);
            $user->assignRole($role->name);
        }
    }
}
