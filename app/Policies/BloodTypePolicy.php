<?php

namespace App\Policies;

use App\Models\User;
use App\Models\BloodType;
use Illuminate\Auth\Access\HandlesAuthorization;

class BloodTypePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the bloodType can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list bloodtypes');
    }

    /**
     * Determine whether the bloodType can view the model.
     */
    public function view(User $user, BloodType $model): bool
    {
        return $user->hasPermissionTo('view bloodtypes');
    }

    /**
     * Determine whether the bloodType can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create bloodtypes');
    }

    /**
     * Determine whether the bloodType can update the model.
     */
    public function update(User $user, BloodType $model): bool
    {
        return $user->hasPermissionTo('update bloodtypes');
    }

    /**
     * Determine whether the bloodType can delete the model.
     */
    public function delete(User $user, BloodType $model): bool
    {
        return $user->hasPermissionTo('delete bloodtypes');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete bloodtypes');
    }

    /**
     * Determine whether the bloodType can restore the model.
     */
    public function restore(User $user, BloodType $model): bool
    {
        return false;
    }

    /**
     * Determine whether the bloodType can permanently delete the model.
     */
    public function forceDelete(User $user, BloodType $model): bool
    {
        return false;
    }
}
