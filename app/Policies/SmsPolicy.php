<?php

namespace App\Policies;

use App\Models\Sms;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SmsPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the sms can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list allsms');
    }

    /**
     * Determine whether the sms can view the model.
     */
    public function view(User $user, Sms $model): bool
    {
        return $user->hasPermissionTo('view allsms');
    }

    /**
     * Determine whether the sms can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create allsms');
    }

    /**
     * Determine whether the sms can update the model.
     */
    public function update(User $user, Sms $model): bool
    {
        return $user->hasPermissionTo('update allsms');
    }

    /**
     * Determine whether the sms can delete the model.
     */
    public function delete(User $user, Sms $model): bool
    {
        return $user->hasPermissionTo('delete allsms');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete allsms');
    }

    /**
     * Determine whether the sms can restore the model.
     */
    public function restore(User $user, Sms $model): bool
    {
        return false;
    }

    /**
     * Determine whether the sms can permanently delete the model.
     */
    public function forceDelete(User $user, Sms $model): bool
    {
        return false;
    }
}
