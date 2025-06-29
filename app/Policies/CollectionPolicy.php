<?php

namespace App\Policies;

use App\Models\Collection;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CollectionPolicy
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
        return $user->can('collection viewAny');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Collection  $collection
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Collection $collection)
    {
        return $user->can('collection view');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->can('collection create');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Collection  $collection
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Collection $collection)
    {
        return $user->can('collection update');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Collection  $collection
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Collection $collection)
    {
        return $user->can('collection delete');

    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Collection  $collection
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Collection $collection)
    {
        return $user->can('collection restore');


    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Collection  $collection
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Collection $collection)
    {
        return $user->can('collection forceDelte ');
    }
}
