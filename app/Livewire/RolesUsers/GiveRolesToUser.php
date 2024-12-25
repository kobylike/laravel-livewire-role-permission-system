<?php

namespace App\Livewire\RolesUsers;

use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class GiveRolesToUser extends Component
{

    public $user;
    public $selectedRoles = [];
    public $roles;



    public function mount($user){

        $this->user=User::findOrFail($user) ;
        $this->selectedRoles = $this->user->roles->pluck("id")->toArray();
        $this->roles =Role::all();


    }

    public function giveRoleToUser(){
        if(empty($this->selectedRoles)){
            return session()->flash("error","No Role Selected");
        }

        $roleNames = Role::whereIn('id', $this->selectedRoles)->pluck('name')->toArray();

        // Sync roles with the user
        $this->user->syncRoles($roleNames);

        return session()->flash("success","Role Assigned to User Sccessfully");
    }

    public function render()
    {
        return view('livewire.roles-users.give-roles-to-user');
    }
}
