<?php

namespace App\Policies;

use App\Models\User;
use App\Models\MotherHealthStatus;
use Illuminate\Auth\Access\HandlesAuthorization;

class MotherHealthStatusPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the motherHealthStatus can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list motherhealthstatuses');
    }

    /**
     * Determine whether the motherHealthStatus can view the model.
     */
    public function view(User $user, MotherHealthStatus $model): bool
    {
        return $user->hasPermissionTo('view motherhealthstatuses');
    }

    /**
     * Determine whether the motherHealthStatus can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create motherhealthstatuses');
    }

    /**
     * Determine whether the motherHealthStatus can update the model.
     */
    public function update(User $user, MotherHealthStatus $model): bool
    {
        return $user->hasPermissionTo('update motherhealthstatuses');
    }

    /**
     * Determine whether the motherHealthStatus can delete the model.
     */
    public function delete(User $user, MotherHealthStatus $model): bool
    {
        return $user->hasPermissionTo('delete motherhealthstatuses');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete motherhealthstatuses');
    }

    /**
     * Determine whether the motherHealthStatus can restore the model.
     */
    public function restore(User $user, MotherHealthStatus $model): bool
    {
        return false;
    }

    /**
     * Determine whether the motherHealthStatus can permanently delete the model.
     */
    public function forceDelete(User $user, MotherHealthStatus $model): bool
    {
        return false;
    }
}
