<?php

namespace App\Livewire\Roles;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class EditRoleComponent extends Component
{


    public $nameProperty;
    public $name;
    public $role;
    public $successMessage;
    protected $rules =[
        'name' => 'required| max:255'
    ];

    public function updated($nameProperty){

        $this->validateOnly($nameProperty);
    }

    public function mount(Role $role){

        $this->role = $role->id;
        $this->name = $role->name;
    }

    public function update(){

        $this->validate();

        $role_id =Role::findOrFail($this->role);

        if($role_id){

            $role_id->update([

                'name' => $this->name
            ]);
            $this->reset();

            return $this->successMessage = 'Successfully Updated';
        }

    }


    public function render()
    {
        return view('livewire.roles.edit-role-component');
    }
}
