<?php
namespace App\Repositories\Contracts;

use Illuminate\Http\Request;
use App\Models\Poll;

interface UserRepositoryInterface
{
    public function register(array $data);
    public function getHighestPoint($limit);
    public function getQuestion($id, $limit);
    public function updateUser($id, Request $request);
    public function poll($userId, Poll $poll);
}
