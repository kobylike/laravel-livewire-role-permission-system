<?php

use App\Livewire\Auth\LoginComponent;
use App\Livewire\Roles\RoleComponent;
use App\Livewire\Users\UserComponent;
use Illuminate\Support\Facades\Route;
use App\Livewire\Roles\EditRoleComponent;
use App\Livewire\Roles\CreateRoleComponent;
use App\Livewire\RolesUsers\GiveRolesToUser;
use App\Livewire\Dashboard\DashboardComponent;
use App\Livewire\Permissions\PermissionComponent;
use App\Livewire\Users\UserRegistrationComponent;
use App\Livewire\PermissionRole\GivePermissionToRole;
use App\Livewire\Permissions\EditPermissionComponent;
use App\Livewire\Permissions\CreatePermissionComponent;
use App\Livewire\Users\CreateUserComponent;

Route::get('/', LoginComponent::class)->name('login');
Route::get('/registration', UserRegistrationComponent::class)->name('register');

Route::middleware(['auth'])->prefix('dashboard')->group(function () {
    Route::get('/', DashboardComponent::class)->name('dashboard');

    // Users
    Route::get('/users', UserComponent::class)->name('users.index');
    Route::get('/users/create', CreateUserComponent::class)->name('user.create');
    Route::get('/users/{user}/give-role', GiveRolesToUser::class)->name('user.roles');

    // Roles
    Route::get('/roles', RoleComponent::class)->name('roles.index');
    Route::get('/roles/create', CreateRoleComponent::class)->name('roles.create');
    Route::get('/roles/{role}/edit', EditRoleComponent::class)->name('roles.edit');
    Route::get('/roles/{role}/give-permission', GivePermissionToRole::class)->name('roles.permission');

    // Permissions
    Route::get('/permissions', PermissionComponent::class)->name('permissions.index');
    Route::get('/permissions/create', CreatePermissionComponent::class)->name('permissions.create');
    Route::get('/permissions/{permission}/edit', EditPermissionComponent::class)->name('permissions.edit');
});
