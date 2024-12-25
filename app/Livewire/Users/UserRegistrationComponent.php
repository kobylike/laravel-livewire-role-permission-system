<?php

namespace App\Livewire\Users;

use App\Models\User;
use Livewire\Component;

class UserRegistrationComponent extends Component
{


    public $name;
    public $password;
    public $password_confirmation;
    public $phone;
    public $email;
    public $nameProperty;
    public $successMessage;
    public $errorMessage;

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6|confirmed', // Use password confirmation
        'phone' => 'required|numeric|regex:/^\+?[0-9]{10,15}$/|unique:users,phone',

    ];


    public function updated($nameProperty){
        $this->validateOnly($nameProperty);

    }

    public function save(){

        $this->validate();



        try {
            // Create the user
            $user = User::create([
                'name' => $this->name,
                'email' => $this->email,
                'password' => bcrypt($this->password),
                'phone' => $this->phone,
            ]);


            $user->assignRole('User');

            // Set success message
            $this->successMessage = 'Registered Successfully!';

            // Redirect to login or dashboard
            return redirect()->route('/');

        } catch (\Exception $e) {
            // Handle exception and set error message
            $this->errorMessage = 'Registration failed: ' . $e->getMessage();
        }

    }

    public function render()
    {
        return view('livewire.users.user-registration-component');
    }
}
