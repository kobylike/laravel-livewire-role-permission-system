<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class LoginComponent extends Component
{

    public $email;
    public $password;
    public $nameProperty;
    public $errorMessage;


    protected $rules = [
        'email' => 'required|email',
        'password' => 'required|min:8'
    ];

    public function updated($nameProperty){

        $this->validateOnly($nameProperty);
    }

    public function login(){

        $this->validate();

        $credentials = ['email'=>$this->email, 'password'=>$this->password];

        if(Auth::attempt($credentials)){
            session()->regenerate();
            return redirect()->route('dashboard');

        }
         $this->errorMessage = 'Invalid Credentials';
         return redirect()->route('login');

    }
    public function render()
    {
        return view('livewire.auth.login-component');
    }
}
