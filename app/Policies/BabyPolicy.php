<?php

namespace App\Policies;

use App\Models\Baby;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BabyPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the baby can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list babies');
    }

    /**
     * Determine whether the baby can view the model.
     */
    public function view(User $user, Baby $model): bool
    {
        return $user->hasPermissionTo('view babies');
    }

    /**
     * Determine whether the baby can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create babies');
    }

    /**
     * Determine whether the baby can update the model.
     */
    public function update(User $user, Baby $model): bool
    {
        return $user->hasPermissionTo('update babies');
    }

    /**
     * Determine whether the baby can delete the model.
     */
    public function delete(User $user, Baby $model): bool
    {
        return $user->hasPermissionTo('delete babies');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete babies');
    }

    /**
     * Determine whether the baby can restore the model.
     */
    public function restore(User $user, Baby $model): bool
    {
        return false;
    }

    /**
     * Determine whether the baby can permanently delete the model.
     */
    public function forceDelete(User $user, Baby $model): bool
    {
        return false;
    }
}
