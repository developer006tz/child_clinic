<?php

namespace App\Policies;

use App\Models\User;
use App\Models\BirthCertificate;
use Illuminate\Auth\Access\HandlesAuthorization;

class BirthCertificatePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the birthCertificate can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list birthcertificates');
    }

    /**
     * Determine whether the birthCertificate can view the model.
     */
    public function view(User $user, BirthCertificate $model): bool
    {
        return $user->hasPermissionTo('view birthcertificates');
    }

    /**
     * Determine whether the birthCertificate can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create birthcertificates');
    }

    /**
     * Determine whether the birthCertificate can update the model.
     */
    public function update(User $user, BirthCertificate $model): bool
    {
        return $user->hasPermissionTo('update birthcertificates');
    }

    /**
     * Determine whether the birthCertificate can delete the model.
     */
    public function delete(User $user, BirthCertificate $model): bool
    {
        return $user->hasPermissionTo('delete birthcertificates');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete birthcertificates');
    }

    /**
     * Determine whether the birthCertificate can restore the model.
     */
    public function restore(User $user, BirthCertificate $model): bool
    {
        return false;
    }

    /**
     * Determine whether the birthCertificate can permanently delete the model.
     */
    public function forceDelete(User $user, BirthCertificate $model): bool
    {
        return false;
    }
}
