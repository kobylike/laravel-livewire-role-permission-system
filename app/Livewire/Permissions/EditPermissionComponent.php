<?php

namespace App\Livewire\Permissions;

use Livewire\Component;
use Spatie\Permission\Models\Permission;

class EditPermissionComponent extends Component
{

    public $nameProperty;
    public $name;
    public $permission;
    public $successMessage;
    protected $rules =[
        'name' => 'required| max:255'
    ];

    public function updated($nameProperty){

        $this->validateOnly($nameProperty);
    }

    public function mount(Permission $permission){

        $this->permission = $permission->id;
        $this->name = $permission->name;
    }

    public function update(){

        $this->validate();

        $permission_id =Permission::findOrFail($this->permission);

        if($permission_id){

            $permission_id->update([

                'name' => $this->name
            ]);
            $this->reset();

            return $this->successMessage = 'Successfully Updated';
        }

    }
    public function render()
    {
        return view('livewire.permissions.edit-permission-component');
    }
}
