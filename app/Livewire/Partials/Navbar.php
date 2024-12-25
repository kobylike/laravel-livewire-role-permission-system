<?php

namespace App\Livewire\Partials;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Navbar extends Component
{
    public $users;
    public function mount(){

        // $this->users = User::with('roles')->get();
        $this->users = Auth::user();

    }
    public function logout(){
        Auth::logout();
        session()->regenerate();
        session()->regenerateToken();
        return redirect()->route('login');


    }
    public function render()
    {
        return view('livewire.partials.navbar');
    }


}
