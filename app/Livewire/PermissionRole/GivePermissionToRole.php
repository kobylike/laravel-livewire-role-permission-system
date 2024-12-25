<?php

namespace App\Livewire\PermissionRole;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Artisan;

class GivePermissionToRole extends Component
{
    public $role; // Store the Role model instance
    public $permissions; // Store all permissions
    public $selectedPermissions = []; // Array of selected permission IDs

    /**
     * Mount the component with the role and permissions.
     */
    public function mount($role)
    {
        $this->role = Role::findOrFail($role); // Retrieve the role by ID

        // Get permissions already assigned to the role
        $this->selectedPermissions = $this->role->permissions->pluck('id')->toArray();

        // Fetch all available permissions
        $this->permissions = Permission::all();
    }

    /**
     * Add or remove permissions from the role.
     */
    public function addPermissionToRole()
    {
         // Retrieve permission names based on selected IDs
    $permissionNames = Permission::whereIn('id', $this->selectedPermissions)->pluck('name')->toArray();

    // Sync the permissions using their names
    $this->role->syncPermissions($permissionNames);


        // Clear the permissions cache
        Artisan::call('permission:cache-reset');

        // Flash success message
        session()->flash('message', 'Permissions updated successfully.');
    }

    /**
     * Render the component view.
     */
    public function render()
    {
        return view('livewire.permissionrole.give-permission-to-role');
    }
}
