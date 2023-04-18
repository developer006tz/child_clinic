<?php

namespace App\Policies;

use App\Models\User;
use App\Models\ComposeSms;
use Illuminate\Auth\Access\HandlesAuthorization;

class ComposeSmsPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the composeSms can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list allcomposesms');
    }

    /**
     * Determine whether the composeSms can view the model.
     */
    public function view(User $user, ComposeSms $model): bool
    {
        return $user->hasPermissionTo('view allcomposesms');
    }

    /**
     * Determine whether the composeSms can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create allcomposesms');
    }

    /**
     * Determine whether the composeSms can update the model.
     */
    public function update(User $user, ComposeSms $model): bool
    {
        return $user->hasPermissionTo('update allcomposesms');
    }

    /**
     * Determine whether the composeSms can delete the model.
     */
    public function delete(User $user, ComposeSms $model): bool
    {
        return $user->hasPermissionTo('delete allcomposesms');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete allcomposesms');
    }

    /**
     * Determine whether the composeSms can restore the model.
     */
    public function restore(User $user, ComposeSms $model): bool
    {
        return false;
    }

    /**
     * Determine whether the composeSms can permanently delete the model.
     */
    public function forceDelete(User $user, ComposeSms $model): bool
    {
        return false;
    }
}
