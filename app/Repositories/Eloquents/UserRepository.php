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
            'avatar' => config('asset.avatar'),
        ]);
    }
    
    public function getHighestPoint($limit)
    {
        $users = $this->model->where('status', 1)->orderBy('point', 'DESC')->limit($limit)->get();

        return $users;
    }

    public function getQuestion($id, $limit)
    {
        $user = $this->model->findOrFail($id);
        $questions = $user->questions()->with(['category', 'votes', 'answers']);
        $questions = $questions->orderBy('id', 'DESC')->paginate($limit);

        return $questions;
    }
}
