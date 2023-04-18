<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Desease;
use Illuminate\Auth\Access\HandlesAuthorization;

class DeseasePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the desease can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list deseases');
    }

    /**
     * Determine whether the desease can view the model.
     */
    public function view(User $user, Desease $model): bool
    {
        return $user->hasPermissionTo('view deseases');
    }

    /**
     * Determine whether the desease can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create deseases');
    }

    /**
     * Determine whether the desease can update the model.
     */
    public function update(User $user, Desease $model): bool
    {
        return $user->hasPermissionTo('update deseases');
    }

    /**
     * Determine whether the desease can delete the model.
     */
    public function delete(User $user, Desease $model): bool
    {
        return $user->hasPermissionTo('delete deseases');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete deseases');
    }

    /**
     * Determine whether the desease can restore the model.
     */
    public function restore(User $user, Desease $model): bool
    {
        return false;
    }

    /**
     * Determine whether the desease can permanently delete the model.
     */
    public function forceDelete(User $user, Desease $model): bool
    {
        return false;
    }
}
