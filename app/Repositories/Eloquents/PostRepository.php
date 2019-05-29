<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Contracts\PostRepositoryInterface;
use App\Models\Post;

class PostRepository extends BaseRepository implements PostRepositoryInterface
{
    public function getModel()
    {
        return Post::class;
    }

    public function editorChoice()
    {
        return $this->model->where('status', config('post.editor_choice'))->orderBy('created_at', 'DESC');
    }

    public function trending()
    {
        return $this->model->where('status', config('post.trending'))->orderBy('created_at', 'DESC');
    }
}
