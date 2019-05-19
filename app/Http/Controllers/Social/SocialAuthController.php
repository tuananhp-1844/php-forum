<?php

namespace App\Http\Controllers\Social;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Socialite;
use App\Repositories\Contracts\UserRepositoryInterface;

class SocialAuthController extends Controller
{
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function redirect($social)
    {
        return Socialite::driver($social)->redirect();
    }

    public function callback($social)
    {
        $user = $this->userRepository->loginFB(Socialite::driver($social)->user(), $social);
        auth()->login($user);

        return redirect()->to('/');
    }
}
