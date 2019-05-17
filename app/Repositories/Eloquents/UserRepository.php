<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Contracts\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Traits\Upload;
use App\Models\Poll;
use Hash;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    use Upload;
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

    public function updateUser($id, Request $request)
    {
        $user  = $this->model->findOrFail($id);
        $user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'website' => $request->website,
            'facebook' => $request->facebook,
            'google' => $request->google,
            'linker' => $request->linker,
            'twitter' => $request->twitter,
            'country' => $request->country,
            'info' => $request->info,
        ]);

        $image = '';
        if ($request->hasFile('avatar')) {
            $avatar = $this->upload($request->avatar, config('asset.avatar_folder'));
            $user->avatar = $avatar;
            $user->save();
        }

        return $user;
    }

    public function poll($userId, Poll $poll)
    {
        foreach ($poll->question->polls as $key => $value) {
            $value->users()->detach($userId);
        }
        
        return $poll->users()->attach($userId);
    }
}
