<?php

namespace App\Http\Controllers\Admin\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Question;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $countMember = User::count();
        $countPost = Post::count();
        $countQuestion = Question::count();
        $countTag = Tag::count();

        return response()->json([
            'member_count' => $countMember,
            'post_count' => $countPost,
            'question_count' => $countQuestion,
            'tag_count' => $countTag,
        ], 200);
    }
}
