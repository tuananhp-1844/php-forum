<?php
namespace App\Repositories\Contracts;

use App\Models\Post;
use Illuminate\Http\Request;

interface PostRepositoryInterface
{
    public function editorChoice();
    public function trending();
    public function store(Request $request);
    public function updatePost(Request $request, Post $post);
    public function checkUserClip($userId, Post $post);
    public function clip($userId, Post $post);
    public function destroyClip($userId, Post $post);
}
