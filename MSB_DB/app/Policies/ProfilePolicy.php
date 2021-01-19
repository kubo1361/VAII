<?php

namespace App\Policies;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProfilePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return auth()->user->is_admin;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @return mixed
     */
    public function view(User $user, Profile $profile)
    {
        $ownProfile = auth()->user()->id == $profile->user->id;
        $isAdmin = auth()->user()->is_admin;
        $isPublic = !$profile->user->private;

        return $ownProfile || $isAdmin || $isPublic;
    }

    /**
     * Determine whether the user can create models.
     *
     * @return mixed
     */
    public function create(User $user)
    {
    }

    /**
     * Determine whether the user can update the model.
     *
     * @return mixed
     */
    public function update(User $user, Profile $profile)
    {
        return $user->id === $profile->user_id || $user->is_admin;
    }

    public function ownProfile(User $user, Profile $profile)
    {
        return auth()->user()->id == $profile->user->id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @return mixed
     */
    public function delete(User $user, Profile $profile)
    {
        return $user->id === $profile->user_id || $user->is_admin;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @return mixed
     */
    public function restore(User $user, Profile $profile)
    {
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @return mixed
     */
    public function forceDelete(User $user, Profile $profile)
    {
    }
}
