<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Insurance;
use Illuminate\Auth\Access\HandlesAuthorization;

class InsurancePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the insurance can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list insurances');
    }

    /**
     * Determine whether the insurance can view the model.
     */
    public function view(User $user, Insurance $model): bool
    {
        return $user->hasPermissionTo('view insurances');
    }

    /**
     * Determine whether the insurance can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create insurances');
    }

    /**
     * Determine whether the insurance can update the model.
     */
    public function update(User $user, Insurance $model): bool
    {
        return $user->hasPermissionTo('update insurances');
    }

    /**
     * Determine whether the insurance can delete the model.
     */
    public function delete(User $user, Insurance $model): bool
    {
        return $user->hasPermissionTo('delete insurances');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete insurances');
    }

    /**
     * Determine whether the insurance can restore the model.
     */
    public function restore(User $user, Insurance $model): bool
    {
        return false;
    }

    /**
     * Determine whether the insurance can permanently delete the model.
     */
    public function forceDelete(User $user, Insurance $model): bool
    {
        return false;
    }
}
