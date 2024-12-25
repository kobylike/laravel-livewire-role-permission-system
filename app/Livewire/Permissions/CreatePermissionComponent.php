<?php

namespace App\Livewire\Permissions;

use Livewire\Component;
use Spatie\Permission\Models\Permission;

class CreatePermissionComponent extends Component
{
    public $name;
    public $nameProperty;

    public $successMessage;

    protected $rules = [

        'name' => 'required|max:255|unique:permissions,name'
    ];

    public function updated($nameProperty){

        $this->validateOnly($nameProperty);
    }

    public function save(){

        $this->validate();

        $query = Permission::create([

            'name'=> $this->name]);
            $this->reset();

            if($query){
                return $this->successMessage =' Add Successfully';
            }

    }

    public function render()
    {
        return view('livewire.permissions.create-permission-component');
    }
}
