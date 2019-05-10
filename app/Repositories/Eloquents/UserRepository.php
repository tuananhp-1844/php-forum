<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Contracts\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Http\Request;
use Hash;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    /**
     * Specify Model class name
     */
    public function getModel()
    {
        return User::class;
    }

    public function register(array $data)
    {
        return User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role_id' => config('role.member'),
            'avatar' => config('asset.logo'),
        ]);
    }
}
