<?php

namespace App\Policies;

use App\Models\User;
use App\Models\PrenatalApointment;
use Illuminate\Auth\Access\HandlesAuthorization;

class PrenatalApointmentPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the prenatalApointment can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list prenatalapointments');
    }

    /**
     * Determine whether the prenatalApointment can view the model.
     */
    public function view(User $user, PrenatalApointment $model): bool
    {
        return $user->hasPermissionTo('view prenatalapointments');
    }

    /**
     * Determine whether the prenatalApointment can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create prenatalapointments');
    }

    /**
     * Determine whether the prenatalApointment can update the model.
     */
    public function update(User $user, PrenatalApointment $model): bool
    {
        return $user->hasPermissionTo('update prenatalapointments');
    }

    /**
     * Determine whether the prenatalApointment can delete the model.
     */
    public function delete(User $user, PrenatalApointment $model): bool
    {
        return $user->hasPermissionTo('delete prenatalapointments');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete prenatalapointments');
    }

    /**
     * Determine whether the prenatalApointment can restore the model.
     */
    public function restore(User $user, PrenatalApointment $model): bool
    {
        return false;
    }

    /**
     * Determine whether the prenatalApointment can permanently delete the model.
     */
    public function forceDelete(User $user, PrenatalApointment $model): bool
    {
        return false;
    }
}
