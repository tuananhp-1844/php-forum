<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Post;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the models post.
     *
     * @param  \App\Models\User  $user
     * @param  \App\ModelsPost  $modelsPost
     * @return mixed
     */
    public function view(User $user, Post $post)
    {
        //
    }

    /**
     * Determine whether the user can create models posts.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the models post.
     *
     * @param  \App\Models\User  $user
     * @param  \App\ModelsPost  $modelsPost
     * @return mixed
     */
    public function update(User $user, Post $post)
    {
        return $user->id === $post->user_id;
    }

    /**
     * Determine whether the user can delete the models post.
     *
     * @param  \App\Models\User  $user
     * @param  \App\ModelsPost  $modelsPost
     * @return mixed
     */
    public function delete(User $user, Post $post)
    {
        return $user->id === $post->user_id;
    }

    /**
     * Determine whether the user can restore the models post.
     *
     * @param  \App\Models\User  $user
     * @param  \App\ModelsPost  $modelsPost
     * @return mixed
     */
    public function restore(User $user, Post $post)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the models post.
     *
     * @param  \App\Models\User  $user
     * @param  \App\ModelsPost  $modelsPost
     * @return mixed
     */
    public function forceDelete(User $user, Post $post)
    {
        //
    }
}
