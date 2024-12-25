<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    /**
     * Determine if the current user can delete the target user.
     */
    public function delete(User $currentUser, User $targetUser): bool
    {
        // Prevent deletion of Super Admins
        if ($targetUser->hasRole('Super Admin')) {
            return false;
        }

        // Check if the current user has permission to delete users
        return $currentUser->hasPermissionTo('delete user');
    }

    /**
     * (Optional) Add more policies, e.g., view, update, etc.
     */
    public function update(User $currentUser, User $targetUser): bool
    {
        // Example rule: Users can update only users in their own role or below
        return $currentUser->role->level >= $targetUser->role->level;
    }

    public function view(User $currentUser, User $targetUser): bool
    {
        // Example rule: Users can view all except Super Admins
        return !$targetUser->hasRole('Super Admin') || $currentUser->hasRole('Super Admin');
    }
}
