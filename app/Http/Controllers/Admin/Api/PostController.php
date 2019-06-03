<?php

namespace App\Http\Controllers\Admin\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Posts\PostResource;
use App\Repositories\Contracts\PostRepositoryInterface;
use App\Models\Post;

class PostController extends Controller
{
    private $postRespository;

    public function __construct(PostRepositoryInterface $postRespository)
    {
        $this->middleware('auth:api');
        $this->postRespository = $postRespository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = $this->postRespository->with(['category', 'user', 'tags']);
        $posts = $posts->paginate(config('pagination.post_admin'));

        return PostResource::collection($posts);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function changeStatus(Post $post, Request $request)
    {
        $post->update([
            'status' => $request->status,
        ]);
        $post->load(['category', 'user', 'tags']);

        return new PostResource($post);
    }
}
