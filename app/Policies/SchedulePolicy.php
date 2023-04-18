<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Schedule;
use Illuminate\Auth\Access\HandlesAuthorization;

class SchedulePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the schedule can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list schedules');
    }

    /**
     * Determine whether the schedule can view the model.
     */
    public function view(User $user, Schedule $model): bool
    {
        return $user->hasPermissionTo('view schedules');
    }

    /**
     * Determine whether the schedule can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create schedules');
    }

    /**
     * Determine whether the schedule can update the model.
     */
    public function update(User $user, Schedule $model): bool
    {
        return $user->hasPermissionTo('update schedules');
    }

    /**
     * Determine whether the schedule can delete the model.
     */
    public function delete(User $user, Schedule $model): bool
    {
        return $user->hasPermissionTo('delete schedules');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete schedules');
    }

    /**
     * Determine whether the schedule can restore the model.
     */
    public function restore(User $user, Schedule $model): bool
    {
        return false;
    }

    /**
     * Determine whether the schedule can permanently delete the model.
     */
    public function forceDelete(User $user, Schedule $model): bool
    {
        return false;
    }
}
