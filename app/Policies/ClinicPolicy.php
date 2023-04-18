<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Clinic;
use Illuminate\Auth\Access\HandlesAuthorization;

class ClinicPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the clinic can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list clinics');
    }

    /**
     * Determine whether the clinic can view the model.
     */
    public function view(User $user, Clinic $model): bool
    {
        return $user->hasPermissionTo('view clinics');
    }

    /**
     * Determine whether the clinic can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create clinics');
    }

    /**
     * Determine whether the clinic can update the model.
     */
    public function update(User $user, Clinic $model): bool
    {
        return $user->hasPermissionTo('update clinics');
    }

    /**
     * Determine whether the clinic can delete the model.
     */
    public function delete(User $user, Clinic $model): bool
    {
        return $user->hasPermissionTo('delete clinics');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete clinics');
    }

    /**
     * Determine whether the clinic can restore the model.
     */
    public function restore(User $user, Clinic $model): bool
    {
        return false;
    }

    /**
     * Determine whether the clinic can permanently delete the model.
     */
    public function forceDelete(User $user, Clinic $model): bool
    {
        return false;
    }
}
