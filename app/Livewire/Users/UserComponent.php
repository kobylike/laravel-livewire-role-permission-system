<?php

namespace App\Livewire\Users;
use Spatie\Permission\PermissionRegistrar;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;
class UserComponent extends Component
{


    public $users;
    public $successMessage;

    public function mount(){
        // $this->users =User::all();
           // Fetch users with their roles
           $this->users = User::with('roles')->get();
        //    $this->users = Auth::user();
    }

    public function delete($id)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user(); // Get the authenticated user

        // Clear cached permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Check if the user has the required permission to delete
        if (!$user->hasPermissionTo('delete user')) {
            abort(403, 'You do not have permission to delete this user.');
        }

        // Find the user by ID to be deleted
        $userToDelete = User::findOrFail($id);

        // Perform the delete if the user exists
        if ($userToDelete) {
            $userToDelete->delete();
            $this->successMessage = 'Deleted Successfully';
        }

        // Refresh the list of users
        $this->users = User::all();
    }


    public function render()
    {
        return view('livewire.users.user-component');
    }
}
