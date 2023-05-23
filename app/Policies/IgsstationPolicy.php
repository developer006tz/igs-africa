<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Igsstation;
use Illuminate\Auth\Access\HandlesAuthorization;

class IgsstationPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the igsstation can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list igsstations');
    }

    /**
     * Determine whether the igsstation can view the model.
     */
    public function view(User $user, Igsstation $model): bool
    {
        return $user->hasPermissionTo('view igsstations');
    }

    /**
     * Determine whether the igsstation can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create igsstations');
    }

    /**
     * Determine whether the igsstation can update the model.
     */
    public function update(User $user, Igsstation $model): bool
    {
        return $user->hasPermissionTo('update igsstations');
    }

    /**
     * Determine whether the igsstation can delete the model.
     */
    public function delete(User $user, Igsstation $model): bool
    {
        return $user->hasPermissionTo('delete igsstations');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete igsstations');
    }

    /**
     * Determine whether the igsstation can restore the model.
     */
    public function restore(User $user, Igsstation $model): bool
    {
        return false;
    }

    /**
     * Determine whether the igsstation can permanently delete the model.
     */
    public function forceDelete(User $user, Igsstation $model): bool
    {
        return false;
    }
}
