<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    /**
     * Perform pre-authorization checks.
     * Admin and manager user can create, update or delete user.
     *
     * @param User $user
     * @return boolean
     */
    public function before(User $user, string $ability): bool|null
    {
        if ($user->role_id ===1 || $user->role_id ===3){
            return true;
        }

        return null;
    }


    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, User $model): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     * 
     */
    public function create(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     * 
     */
    public function update(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     * 
     */
    public function delete(User $user, User $model): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, User $model): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, User $model): bool
    {
        return false;
    }
}
