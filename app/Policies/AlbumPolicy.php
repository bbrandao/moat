<?php

namespace App\Policies;

use App\Models\Album;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AlbumPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user     
     * @return bool
     */
    public function delete(User $user)
    {
        return $user->isAdmin();
    }
}
