<?php

namespace App\Policies;

use App\Models\User;
use App\Models\MessageTemplate;
use Illuminate\Auth\Access\HandlesAuthorization;

class MessageTemplatePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the messageTemplate can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list messagetemplates');
    }

    /**
     * Determine whether the messageTemplate can view the model.
     */
    public function view(User $user, MessageTemplate $model): bool
    {
        return $user->hasPermissionTo('view messagetemplates');
    }

    /**
     * Determine whether the messageTemplate can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create messagetemplates');
    }

    /**
     * Determine whether the messageTemplate can update the model.
     */
    public function update(User $user, MessageTemplate $model): bool
    {
        return $user->hasPermissionTo('update messagetemplates');
    }

    /**
     * Determine whether the messageTemplate can delete the model.
     */
    public function delete(User $user, MessageTemplate $model): bool
    {
        return $user->hasPermissionTo('delete messagetemplates');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete messagetemplates');
    }

    /**
     * Determine whether the messageTemplate can restore the model.
     */
    public function restore(User $user, MessageTemplate $model): bool
    {
        return false;
    }

    /**
     * Determine whether the messageTemplate can permanently delete the model.
     */
    public function forceDelete(User $user, MessageTemplate $model): bool
    {
        return false;
    }
}
