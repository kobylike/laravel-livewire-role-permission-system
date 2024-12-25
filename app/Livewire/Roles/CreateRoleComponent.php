<?php

namespace App\Livewire\Roles;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class CreateRoleComponent extends Component
{

    public $name;
    public $nameProperty;

    public $successMessage;

    protected $rules = [

        'name' => 'required|max:255|unique:roles,name'
    ];

    public function updated($nameProperty){

        $this->validateOnly($nameProperty);
    }

    public function save(){

        $this->validate();

        $query = Role::create([

            'name'=> $this->name]);
            $this->reset();

            if($query){
                return $this->successMessage =' Add Successfully';
            }

    }
    public function render()
    {
        return view('livewire.roles.create-role-component');
    }
}
