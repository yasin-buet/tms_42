<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\User;

class SupervisorPolicy
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
    public function edit(User $auth, User $supervisor)
    {
        return $supervisor->id === $auth->id;
    }
}
