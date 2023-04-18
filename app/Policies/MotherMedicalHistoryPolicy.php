<?php

namespace App\Policies;

use App\Models\User;
use App\Models\MotherMedicalHistory;
use Illuminate\Auth\Access\HandlesAuthorization;

class MotherMedicalHistoryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the motherMedicalHistory can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list mothermedicalhistories');
    }

    /**
     * Determine whether the motherMedicalHistory can view the model.
     */
    public function view(User $user, MotherMedicalHistory $model): bool
    {
        return $user->hasPermissionTo('view mothermedicalhistories');
    }

    /**
     * Determine whether the motherMedicalHistory can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create mothermedicalhistories');
    }

    /**
     * Determine whether the motherMedicalHistory can update the model.
     */
    public function update(User $user, MotherMedicalHistory $model): bool
    {
        return $user->hasPermissionTo('update mothermedicalhistories');
    }

    /**
     * Determine whether the motherMedicalHistory can delete the model.
     */
    public function delete(User $user, MotherMedicalHistory $model): bool
    {
        return $user->hasPermissionTo('delete mothermedicalhistories');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete mothermedicalhistories');
    }

    /**
     * Determine whether the motherMedicalHistory can restore the model.
     */
    public function restore(User $user, MotherMedicalHistory $model): bool
    {
        return false;
    }

    /**
     * Determine whether the motherMedicalHistory can permanently delete the model.
     */
    public function forceDelete(User $user, MotherMedicalHistory $model): bool
    {
        return false;
    }
}
