<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Answer;
use Illuminate\Auth\Access\HandlesAuthorization;

class AnswerPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the answer.
     *
     * @param  \App\Models\User  $user
     * @param  \App\odel=Models\Answer  $answer
     * @return mixed
     */
    public function view(User $user, Answer $answer)
    {
        //
    }

    /**
     * Determine whether the user can create answers.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the answer.
     *
     * @param  \App\Models\User  $user
     * @param  \App\odel=Models\Answer  $answer
     * @return mixed
     */
    public function update(User $user, Answer $answer)
    {
        return $answer->user_id === $user->id;
    }

    /**
     * Determine whether the user can delete the answer.
     *
     * @param  \App\Models\User  $user
     * @param  \App\odel=Models\Answer  $answer
     * @return mixed
     */
    public function delete(User $user, Answer $answer)
    {
        return $answer->user_id === $user->id;
    }

    /**
     * Determine whether the user can restore the answer.
     *
     * @param  \App\Models\User  $user
     * @param  \App\odel=Models\Answer  $answer
     * @return mixed
     */
    public function restore(User $user, Answer $answer)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the answer.
     *
     * @param  \App\Models\User  $user
     * @param  \App\odel=Models\Answer  $answer
     * @return mixed
     */
    public function forceDelete(User $user, Answer $answer)
    {
        //
    }

    public function setBestAnswer(User $user, Answer $answer)
    {
        return $answer->question->user_id === $user->id;
    }
}
