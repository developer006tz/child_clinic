<?php

namespace App\Policies;

use App\Models\Card;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CardPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the card can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list cards');
    }

    /**
     * Determine whether the card can view the model.
     */
    public function view(User $user, Card $model): bool
    {
        return $user->hasPermissionTo('view cards');
    }

    /**
     * Determine whether the card can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create cards');
    }

    /**
     * Determine whether the card can update the model.
     */
    public function update(User $user, Card $model): bool
    {
        return $user->hasPermissionTo('update cards');
    }

    /**
     * Determine whether the card can delete the model.
     */
    public function delete(User $user, Card $model): bool
    {
        return $user->hasPermissionTo('delete cards');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete cards');
    }

    /**
     * Determine whether the card can restore the model.
     */
    public function restore(User $user, Card $model): bool
    {
        return false;
    }

    /**
     * Determine whether the card can permanently delete the model.
     */
    public function forceDelete(User $user, Card $model): bool
    {
        return false;
    }
}
