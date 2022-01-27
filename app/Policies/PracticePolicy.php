<?php

namespace App\Policies;

use App\Models\Opinion;
use App\Models\Practice;
use App\Models\PublicationState;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class PracticePolicy
{
    use HandlesAuthorization;

    /**
     * Determine if the given user can publish practice.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function publish(User $user, Practice $practice)
    {
        return Gate::allows('isModo', $user) && $practice->state == PublicationState::findBySlug('PRO') &&  Opinion::opinionByPracticeAndUser($practice, $user)->first() instanceof Opinion;
    }

    public function update(User $user, Practice $practice)
    {
        return Gate::allows('isModo', $user) || $practice->user_id == $user->id;
    }
}
