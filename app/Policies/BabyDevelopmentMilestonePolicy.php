<?php

namespace App\Policies;

use App\Models\User;
use App\Models\BabyDevelopmentMilestone;
use Illuminate\Auth\Access\HandlesAuthorization;

class BabyDevelopmentMilestonePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the babyDevelopmentMilestone can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list babydevelopmentmilestones');
    }

    /**
     * Determine whether the babyDevelopmentMilestone can view the model.
     */
    public function view(User $user, BabyDevelopmentMilestone $model): bool
    {
        return $user->hasPermissionTo('view babydevelopmentmilestones');
    }

    /**
     * Determine whether the babyDevelopmentMilestone can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create babydevelopmentmilestones');
    }

    /**
     * Determine whether the babyDevelopmentMilestone can update the model.
     */
    public function update(User $user, BabyDevelopmentMilestone $model): bool
    {
        return $user->hasPermissionTo('update babydevelopmentmilestones');
    }

    /**
     * Determine whether the babyDevelopmentMilestone can delete the model.
     */
    public function delete(User $user, BabyDevelopmentMilestone $model): bool
    {
        return $user->hasPermissionTo('delete babydevelopmentmilestones');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete babydevelopmentmilestones');
    }

    /**
     * Determine whether the babyDevelopmentMilestone can restore the model.
     */
    public function restore(User $user, BabyDevelopmentMilestone $model): bool
    {
        return false;
    }

    /**
     * Determine whether the babyDevelopmentMilestone can permanently delete the model.
     */
    public function forceDelete(
        User $user,
        BabyDevelopmentMilestone $model
    ): bool {
        return false;
    }
}
