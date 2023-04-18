<?php

namespace App\Policies;

use App\Models\User;
use App\Models\BabyProgressHealthReport;
use Illuminate\Auth\Access\HandlesAuthorization;

class BabyProgressHealthReportPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the babyProgressHealthReport can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list babyprogresshealthreports');
    }

    /**
     * Determine whether the babyProgressHealthReport can view the model.
     */
    public function view(User $user, BabyProgressHealthReport $model): bool
    {
        return $user->hasPermissionTo('view babyprogresshealthreports');
    }

    /**
     * Determine whether the babyProgressHealthReport can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create babyprogresshealthreports');
    }

    /**
     * Determine whether the babyProgressHealthReport can update the model.
     */
    public function update(User $user, BabyProgressHealthReport $model): bool
    {
        return $user->hasPermissionTo('update babyprogresshealthreports');
    }

    /**
     * Determine whether the babyProgressHealthReport can delete the model.
     */
    public function delete(User $user, BabyProgressHealthReport $model): bool
    {
        return $user->hasPermissionTo('delete babyprogresshealthreports');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete babyprogresshealthreports');
    }

    /**
     * Determine whether the babyProgressHealthReport can restore the model.
     */
    public function restore(User $user, BabyProgressHealthReport $model): bool
    {
        return false;
    }

    /**
     * Determine whether the babyProgressHealthReport can permanently delete the model.
     */
    public function forceDelete(
        User $user,
        BabyProgressHealthReport $model
    ): bool {
        return false;
    }
}
