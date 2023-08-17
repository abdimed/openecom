<?php

namespace App\Policies;

use App\Models\ContactMessages;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ContactMessagesPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return $user->can('contactmessages viewAny');

    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ContactMessages  $contactmessages
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, ContactMessages $contactmessages)
    {
        return $user->can('contactmessages view');

    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->can('contactmessages create');

    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ContactMessages  $contactmessages
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, ContactMessages $contactmessages)
    {
        return $user->can('contactmessages update');

    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ContactMessages  $contactmessages
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, ContactMessages $contactmessages)
    {
        return $user->can('contactmessages delete');

    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ContactMessages  $contactmessages
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, ContactMessages $contactmessages)
    {
        return $user->can('contactmessages restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ContactMessages  $contactmessages
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, ContactMessages $contactmessages)
    {
        return $user->can('contactmessages forceDelte ');
    }
}
