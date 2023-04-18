<?php

namespace App\Policies;

use App\Models\User;
use App\Models\BabyVaccination;
use Illuminate\Auth\Access\HandlesAuthorization;

class BabyVaccinationPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the babyVaccination can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list babyvaccinations');
    }

    /**
     * Determine whether the babyVaccination can view the model.
     */
    public function view(User $user, BabyVaccination $model): bool
    {
        return $user->hasPermissionTo('view babyvaccinations');
    }

    /**
     * Determine whether the babyVaccination can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create babyvaccinations');
    }

    /**
     * Determine whether the babyVaccination can update the model.
     */
    public function update(User $user, BabyVaccination $model): bool
    {
        return $user->hasPermissionTo('update babyvaccinations');
    }

    /**
     * Determine whether the babyVaccination can delete the model.
     */
    public function delete(User $user, BabyVaccination $model): bool
    {
        return $user->hasPermissionTo('delete babyvaccinations');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete babyvaccinations');
    }

    /**
     * Determine whether the babyVaccination can restore the model.
     */
    public function restore(User $user, BabyVaccination $model): bool
    {
        return false;
    }

    /**
     * Determine whether the babyVaccination can permanently delete the model.
     */
    public function forceDelete(User $user, BabyVaccination $model): bool
    {
        return false;
    }
}
