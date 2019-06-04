<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Contracts\PostRepositoryInterface;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Auth;

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

    public function store(Request $request)
    {
        $post = $this->model->create([
            'user_id' => Auth::user()->id,
            'category_id' => $request->category,
            'title' => $request->title,
            'content' => $request->content,
            'view' => 0,
            'status' => 1,
        ]);

        if ($request->tags && $request->tags !== '') {
            $tagRequest = explode(',', $request->tags);
            $tags = Tag::all();
            $tagId = [];
            foreach ($tagRequest as $key => $value) {
                if ($tags->where('name', $value)->count()) {
                    $tagId[] = $tags->where('name', $value)->first()->id;
                } else {
                    $tag = Tag::create([
                        'name' => $value,
                    ]);
                    $tagId[] = $tag->id;
                }
            }
            $post->tags()->attach($tagId);
        }

        return $post;
    }
     public function updatePost(Request $request, Post $post)
     {
        $post = $post->update([
            'category_id' => $request->category,
            'title' => $request->title,
            'content' => $request->content
        ]);

        if ($request->tags && $request->tags !== '') {
            $tagRequest = explode(',', $request->tags);
            $tags = Tag::all();
            $tagId = [];
            foreach ($tagRequest as $key => $value) {
                if ($tags->where('name', $value)->count()) {
                    $tagId[] = $tags->where('name', $value)->first()->id;
                } else {
                    $tag = Tag::create([
                        'name' => $value,
                    ]);
                    $tagId[] = $tag->id;
                }
            }
            $post->tags()->sync($tagId);
        }

        return $post;
     }
}
