<?php

namespace App\Policies;

use App\Models\User;
use App\Models\BabyMedicalHistory;
use Illuminate\Auth\Access\HandlesAuthorization;

class BabyMedicalHistoryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the babyMedicalHistory can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list babymedicalhistories');
    }

    /**
     * Determine whether the babyMedicalHistory can view the model.
     */
    public function view(User $user, BabyMedicalHistory $model): bool
    {
        return $user->hasPermissionTo('view babymedicalhistories');
    }

    /**
     * Determine whether the babyMedicalHistory can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create babymedicalhistories');
    }

    /**
     * Determine whether the babyMedicalHistory can update the model.
     */
    public function update(User $user, BabyMedicalHistory $model): bool
    {
        return $user->hasPermissionTo('update babymedicalhistories');
    }

    /**
     * Determine whether the babyMedicalHistory can delete the model.
     */
    public function delete(User $user, BabyMedicalHistory $model): bool
    {
        return $user->hasPermissionTo('delete babymedicalhistories');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete babymedicalhistories');
    }

    /**
     * Determine whether the babyMedicalHistory can restore the model.
     */
    public function restore(User $user, BabyMedicalHistory $model): bool
    {
        return false;
    }

    /**
     * Determine whether the babyMedicalHistory can permanently delete the model.
     */
    public function forceDelete(User $user, BabyMedicalHistory $model): bool
    {
        return false;
    }
}
