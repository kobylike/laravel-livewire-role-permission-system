<?php

namespace App\Livewire\Permissions;

use Livewire\Component;
use Spatie\Permission\Models\Permission;

class PermissionComponent extends Component
{

    public $permissions;
    public $successMessage;

    public function mount(){
        $this->permissions =Permission::all();
    }

    public function delete($id){

        $permision_id =Permission::findOrFail($id);

        if($permision_id){
            $permision_id->delete();
            $this->successMessage = 'Deleted Successfully';
        }
        $this->permissions=Permission::all();

    }
    public function render()
    {
        return view('livewire.permissions.permission-component');
    }
}
