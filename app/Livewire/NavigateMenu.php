<?php

// declare(strict_types=1);

namespace App\Livewire;

use Laravel\Jetstream\Http\Livewire\NavigationMenu;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class NavigateMenu extends NavigationMenu
{
    // protected $listeners = ['refresh-navigate-menu' => '$refresh'];
 
    public function dropdownLinks()
    {
        return [
            [
                'name' => 'profile.show',
                'value' => 'site.profile',
                'icon' => 'user',
                'role' => 'view-profile',
            ],
            [
                'name' => 'departments',
                'value' => 'site.departments',
                'icon' => 'squares-2x2',
                'role' => 'view-department',
            ],
            [
                'name' => 'roles',
                'value' => 'site.roles',
                'icon' => 'lock-closed',
                'role' => 'view-role',
            ],
            [
                'name' => 'permissions',
                'value' => 'site.permissions',
                'icon' => 'receipt-percent',
                'role' => 'view-permission',
            ],
            [
                'name' => 'racks',
                'value' => 'site.racks',
                'icon' => 'receipt-percent',
                'role' => 'view-rack',
            ],
            [
                'name' => 'branchs',
                'value' => 'site.branchs',
                'icon' => 'receipt-percent',
                'role' => 'view-branch',
            ],
            [
                'name' => 'subnets',
                'value' => 'site.subnets',
                'icon' => 'user-group',
                'role' => 'view-subnet',
            ],
            [
                'name' => 'patchs',
                'value' => 'site.patchs',
                'icon' => 'receipt-percent',
                'role' => 'view-patch',
            ],
            [
                'name' => 'switch.names',
                'value' => 'site.switch_names',
                'icon' => 'user-group',
                'role' => 'view-switch-name',
            ],
            [
                'name' => 'switchs',
                'value' => 'site.switchs',
                'icon' => 'user-group',
                'role' => 'view-switch',
            ],
            [
                'name' => 'ips',
                'value' => 'site.ips',
                'icon' => 'user-group',
                'role' => 'view-ip',
            ],
            [
                'name' => 'telephones',
                'value' => 'site.telephones',
                'icon' => 'user-group',
                'role' => 'view-telephone',
            ],
            [
                'name' => 'problems',
                'value' => 'site.problems',
                'icon' => 'user-group',
                'role' => 'view-problem',
            ],
            [
                'name' => 'sub.problems',
                'value' => 'site.sub_problems',
                'icon' => 'user-group',
                'role' => 'view-sub-problem',
            ],
            [
                'name' => 'backup',
                'value' => 'site.backup',
                'icon' => 'inbox-stack',
                'role' => 'view-backup-database',
            ],
        ];
    }

    public function responsiveLinks()
    {
        return [
            [
                'name' => 'users',
                'value' => 'site.users',
                'icon' => 'user-group',
                'role' => 'view-user',
            ],
            [
                'name' => 'user.schemas',
                'value' => 'site.user_schemas',
                'icon' => 'user-group',
                'role' => 'view-user-schema',
            ],
        ];
    }

    public function render()
    {
        return view('livewire.navigate-menu');
    }
}
