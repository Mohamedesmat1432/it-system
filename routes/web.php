<?php

use App\Livewire\Backup\ListBackup;
use App\Livewire\Branch\ListBranch;
use App\Livewire\Company\ListCompany;
use App\Livewire\Dashboard\DashboardComponent;
use App\Livewire\Department\ListDepartment;
use App\Livewire\Home\HomeComponent;
use App\Livewire\Ip\ListIp;
use App\Livewire\Patch\ListPatch;
use App\Livewire\Permission\ListPermission;
use App\Livewire\Rack\ListRack;
use App\Livewire\Role\ListRole;
use App\Livewire\Subnet\ListSubnet;
use App\Livewire\Switch\ListSwitch;
use App\Livewire\SwitchName\ListSwitchName;
use App\Livewire\Telephone\ListTelephone;
use App\Livewire\User\ListUser;
use App\Livewire\UserSchema\ListUserSchema;
use Illuminate\Support\Facades\Route;
use Laravel\Jetstream\Http\Controllers\Livewire\UserProfileController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['guest'])->group(function () {
    Route::get('/', HomeComponent::class);
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/user/profile', [UserProfileController::class, 'show'])->name('profile.show');
    Route::get('/backup', ListBackup::class)->name('backup');
    Route::get('/dashboard', DashboardComponent::class)->name('dashboard');
    Route::get('/users', ListUser::class)->name('users');
    Route::get('/roles', ListRole::class)->name('roles');
    Route::get('/permissions', ListPermission::class)->name('permissions');
    Route::get('/departments', ListDepartment::class)->name('departments');
    Route::get('/companies', ListCompany::class)->name('companies');
    Route::get('/branchs', ListBranch::class)->name('branchs');
    Route::get('/racks', ListRack::class)->name('racks');
    Route::get('/subnets', ListSubnet::class)->name('subnets');
    Route::get('/telephones', ListTelephone::class)->name('telephones');
    Route::get('/patchs', ListPatch::class)->name('patchs');
    Route::get('/switch-names', ListSwitchName::class)->name('switch.names');
    Route::get('/switchs', ListSwitch::class)->name('switchs');
    Route::get('/ips', ListIp::class)->name('ips');
    Route::get('/user-schemas', ListUserSchema::class)->name('user.schemas');
});
