<?php

namespace App\Livewire\Users;
// use Spatie\Permission\PermissionRegistrar;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class UserComponent extends Component
{


    public $users;
    public $loggedInUser;
    public $successMessage;

    public function mount(){
        // $this->users =User::all();
           // Fetch users with their roles
        //    $this->users = User::with('roles')->get();

        // Get the authenticated user
    $this->loggedInUser = Auth::user(); // Get the logged-in user

    // Fetch all users except the logged-in user
    $this->users = User::where('id', '!=', $this->loggedInUser->id)
                        ->with('roles')  // Ensure roles are loaded with the users
                        ->get();

        //    $this->users = Auth::user();
    }

    // public function delete($id)
    // {
    //     /** @var \App\Models\User $user */
    //     $user = Auth::user(); // Get the authenticated user

    //     // Clear cached permissions
    //     // app()[PermissionRegistrar::class]->forgetCachedPermissions();

    //     // Check if the user has the required permission to delete
    //     if (!$user->hasPermissionTo('delete user')) {
    //         abort(403, 'You do not have permission to delete this user.');
    //     }

    //     // Find the user by ID to be deleted
    //     $userToDelete = User::findOrFail($id);

    //     // Perform the delete if the user exists
    //     if ($userToDelete) {
    //         $userToDelete->delete();
    //         $this->successMessage = 'Deleted Successfully';
    //     }

    //     // Refresh the list of users
    //     $this->users = User::all();
    // }


    public function delete($id)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user(); // Get the authenticated user

        // Find the user to be deleted
        $userToDelete = User::findOrFail($id);

        // Check if the current user can delete the target user
        if (! $user->can('delete', $userToDelete)) {
            abort(403, 'You do not have permission to delete this user.');
        }

        // Perform the delete
        $userToDelete->delete();

        // Provide feedback
        $this->successMessage = 'Deleted Successfully';

        // Refresh the list of users
        $this->users = User::all();
    }


    public function render()
    {
        return view('livewire.users.user-component');
    }
}
