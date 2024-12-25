<?php

namespace App\Livewire\Users;

use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class CreateUserComponent extends Component
{

    public $name;
    public $email;
    public $password;
    public $password_confirmation;
    public $phone;
    public $roles;
    public $selectedRoles = [];
    public $nameProperty;
    public $user;

    public function mount()
    {
        // Fetch all available roles
        $this->roles = Role::all();

        // Pre-select the "User" role by default
        $defaultUserRole = Role::where('name', 'User')->first();
        if ($defaultUserRole) {
            $this->selectedRoles[] = $defaultUserRole->id;
        }
    }

    protected $rules = [
        'name' => 'required|max:255',
        'email' => 'required|unique:users,email',
        'password' => 'required|min:6|confirmed',
        'phone' => 'required|numeric|regex:/^\+?[0-9]{10,15}$/|unique:users,phone',
        'selectedRoles' => 'required|array|min:1',
    ];

    public function updated($nameProperty)
    {
        $this->validateOnly($nameProperty);
    }

    public function save()
    {
        $this->validate();

        // Check if "Super Admin" role is selected
        $superAdminRole = Role::where('name', 'Super Admin')->first();
        if ($superAdminRole && in_array($superAdminRole->id, $this->selectedRoles)) {
            session()->flash('error', 'You cannot assign the Super Admin role.');
            return;
        }

        // Create the user
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),
            'phone' => $this->phone,
        ]);

        // Sync roles to the user, excluding Super Admin if selected
        $roleNames = Role::whereIn('id', $this->selectedRoles)->pluck('name')->toArray();
        // Ensure "Super Admin" is not included in the assigned roles
        $roleNames = array_filter($roleNames, fn($role) => $role !== 'Super Admin');

        if (empty($roleNames)) {
            session()->flash('error', 'At least one valid role must be assigned.');
            return;
        }

        // Sync the roles to the user
        $user->syncRoles($roleNames);

        // Flash success message
        session()->flash('success', 'User created successfully');
    }

    public function render()
    {
        return view('livewire.users.create-user-component');
    }
}
