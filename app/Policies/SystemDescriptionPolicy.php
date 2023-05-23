<?php

namespace App\Policies;

use App\Models\User;
use App\Models\SystemDescription;
use Illuminate\Auth\Access\HandlesAuthorization;

class SystemDescriptionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the systemDescription can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list systemdescriptions');
    }

    /**
     * Determine whether the systemDescription can view the model.
     */
    public function view(User $user, SystemDescription $model): bool
    {
        return $user->hasPermissionTo('view systemdescriptions');
    }

    /**
     * Determine whether the systemDescription can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create systemdescriptions');
    }

    /**
     * Determine whether the systemDescription can update the model.
     */
    public function update(User $user, SystemDescription $model): bool
    {
        return $user->hasPermissionTo('update systemdescriptions');
    }

    /**
     * Determine whether the systemDescription can delete the model.
     */
    public function delete(User $user, SystemDescription $model): bool
    {
        return $user->hasPermissionTo('delete systemdescriptions');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete systemdescriptions');
    }

    /**
     * Determine whether the systemDescription can restore the model.
     */
    public function restore(User $user, SystemDescription $model): bool
    {
        return false;
    }

    /**
     * Determine whether the systemDescription can permanently delete the model.
     */
    public function forceDelete(User $user, SystemDescription $model): bool
    {
        return false;
    }
}
