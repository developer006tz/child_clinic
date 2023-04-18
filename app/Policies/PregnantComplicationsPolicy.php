<?php

namespace App\Policies;

use App\Models\User;
use App\Models\PregnantComplications;
use Illuminate\Auth\Access\HandlesAuthorization;

class PregnantComplicationsPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the pregnantComplications can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list allpregnantcomplications');
    }

    /**
     * Determine whether the pregnantComplications can view the model.
     */
    public function view(User $user, PregnantComplications $model): bool
    {
        return $user->hasPermissionTo('view allpregnantcomplications');
    }

    /**
     * Determine whether the pregnantComplications can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create allpregnantcomplications');
    }

    /**
     * Determine whether the pregnantComplications can update the model.
     */
    public function update(User $user, PregnantComplications $model): bool
    {
        return $user->hasPermissionTo('update allpregnantcomplications');
    }

    /**
     * Determine whether the pregnantComplications can delete the model.
     */
    public function delete(User $user, PregnantComplications $model): bool
    {
        return $user->hasPermissionTo('delete allpregnantcomplications');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete allpregnantcomplications');
    }

    /**
     * Determine whether the pregnantComplications can restore the model.
     */
    public function restore(User $user, PregnantComplications $model): bool
    {
        return false;
    }

    /**
     * Determine whether the pregnantComplications can permanently delete the model.
     */
    public function forceDelete(User $user, PregnantComplications $model): bool
    {
        return false;
    }
}
