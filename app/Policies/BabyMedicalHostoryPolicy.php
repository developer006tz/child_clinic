<?php

namespace App\Policies;

use App\Models\User;
use App\Models\BabyMedicalHostory;
use Illuminate\Auth\Access\HandlesAuthorization;

class BabyMedicalHostoryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the babyMedicalHostory can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list babymedicalhostories');
    }

    /**
     * Determine whether the babyMedicalHostory can view the model.
     */
    public function view(User $user, BabyMedicalHostory $model): bool
    {
        return $user->hasPermissionTo('view babymedicalhostories');
    }

    /**
     * Determine whether the babyMedicalHostory can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create babymedicalhostories');
    }

    /**
     * Determine whether the babyMedicalHostory can update the model.
     */
    public function update(User $user, BabyMedicalHostory $model): bool
    {
        return $user->hasPermissionTo('update babymedicalhostories');
    }

    /**
     * Determine whether the babyMedicalHostory can delete the model.
     */
    public function delete(User $user, BabyMedicalHostory $model): bool
    {
        return $user->hasPermissionTo('delete babymedicalhostories');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete babymedicalhostories');
    }

    /**
     * Determine whether the babyMedicalHostory can restore the model.
     */
    public function restore(User $user, BabyMedicalHostory $model): bool
    {
        return false;
    }

    /**
     * Determine whether the babyMedicalHostory can permanently delete the model.
     */
    public function forceDelete(User $user, BabyMedicalHostory $model): bool
    {
        return false;
    }
}
