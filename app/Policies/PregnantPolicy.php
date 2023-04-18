<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Pregnant;
use Illuminate\Auth\Access\HandlesAuthorization;

class PregnantPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the pregnant can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list pregnants');
    }

    /**
     * Determine whether the pregnant can view the model.
     */
    public function view(User $user, Pregnant $model): bool
    {
        return $user->hasPermissionTo('view pregnants');
    }

    /**
     * Determine whether the pregnant can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create pregnants');
    }

    /**
     * Determine whether the pregnant can update the model.
     */
    public function update(User $user, Pregnant $model): bool
    {
        return $user->hasPermissionTo('update pregnants');
    }

    /**
     * Determine whether the pregnant can delete the model.
     */
    public function delete(User $user, Pregnant $model): bool
    {
        return $user->hasPermissionTo('delete pregnants');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete pregnants');
    }

    /**
     * Determine whether the pregnant can restore the model.
     */
    public function restore(User $user, Pregnant $model): bool
    {
        return false;
    }

    /**
     * Determine whether the pregnant can permanently delete the model.
     */
    public function forceDelete(User $user, Pregnant $model): bool
    {
        return false;
    }
}
