<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function is_admin(User $user)
    {
        return $user->is_admin;
    }

    public function update(User $currentUser, User $user)
    {
        return $currentUser->id === $user->id;
    }
}
