<?php

namespace App\Livewire\Roles;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class RoleComponent extends Component
{

    public $roles;
    public $successMessage;

    public function mount(){
        $this->roles =Role::all();
    }

    public function delete($id){

        $role_id =Role::findOrFail($id);

        if($role_id){
            $role_id->delete();
            $this->successMessage = 'Deleted Successfully';
        }
        $this->roles=Role::all();

    }
    public function render()
    {
        return view('livewire.roles.role-component');
    }
}
