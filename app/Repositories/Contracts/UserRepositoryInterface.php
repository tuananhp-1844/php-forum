<?php
namespace App\Repositories\Contracts;

use Illuminate\Http\Request;
use App\Models\Poll;
use App\Models\User;
use Laravel\Socialite\Contracts\User as ProviderUser;

interface UserRepositoryInterface
{
    public function register(array $data);
    public function getHighestPoint($limit);
    public function getQuestion($id, $limit);
    public function updateUser($id, Request $request);
    public function poll($userId, Poll $poll);
    public function loginFB(ProviderUser $user, $social);
    public function addPoint(User $user, $typePoint);
    public function userClips(User $user);
    public function userPostClips(User $user);
    public function getAllMenber();
}
