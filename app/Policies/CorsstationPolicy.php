<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Corsstation;
use Illuminate\Auth\Access\HandlesAuthorization;

class CorsstationPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the corsstation can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list corsstations');
    }

    /**
     * Determine whether the corsstation can view the model.
     */
    public function view(User $user, Corsstation $model): bool
    {
        return $user->hasPermissionTo('view corsstations');
    }

    /**
     * Determine whether the corsstation can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create corsstations');
    }

    /**
     * Determine whether the corsstation can update the model.
     */
    public function update(User $user, Corsstation $model): bool
    {
        return $user->hasPermissionTo('update corsstations');
    }

    /**
     * Determine whether the corsstation can delete the model.
     */
    public function delete(User $user, Corsstation $model): bool
    {
        return $user->hasPermissionTo('delete corsstations');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete corsstations');
    }

    /**
     * Determine whether the corsstation can restore the model.
     */
    public function restore(User $user, Corsstation $model): bool
    {
        return false;
    }

    /**
     * Determine whether the corsstation can permanently delete the model.
     */
    public function forceDelete(User $user, Corsstation $model): bool
    {
        return false;
    }
}
