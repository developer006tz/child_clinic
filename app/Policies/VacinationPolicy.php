<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Vacination;
use Illuminate\Auth\Access\HandlesAuthorization;

class VacinationPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the vacination can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list vacinations');
    }

    /**
     * Determine whether the vacination can view the model.
     */
    public function view(User $user, Vacination $model): bool
    {
        return $user->hasPermissionTo('view vacinations');
    }

    /**
     * Determine whether the vacination can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create vacinations');
    }

    /**
     * Determine whether the vacination can update the model.
     */
    public function update(User $user, Vacination $model): bool
    {
        return $user->hasPermissionTo('update vacinations');
    }

    /**
     * Determine whether the vacination can delete the model.
     */
    public function delete(User $user, Vacination $model): bool
    {
        return $user->hasPermissionTo('delete vacinations');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete vacinations');
    }

    /**
     * Determine whether the vacination can restore the model.
     */
    public function restore(User $user, Vacination $model): bool
    {
        return false;
    }

    /**
     * Determine whether the vacination can permanently delete the model.
     */
    public function forceDelete(User $user, Vacination $model): bool
    {
        return false;
    }
}
