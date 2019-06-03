<?php

namespace App\Http\Controllers\Posts;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\PostRepositoryInterface;
use App\Models\Post;
use App\Models\Tag;
use App\Repositories\Contracts\CategoryRepositoryInterface as CategoryInterface;
use App\Repositories\Contracts\QuestionRepositoryInterface as QuestionInterface;
use App\Http\Requests\Posts\CreatePostRequest;

class PostController extends Controller
{
    private $postRepository;
    private $categoryRepository;
    private $questionRepository;

    public function __construct(
        PostRepositoryInterface $postRepository,
        CategoryInterface $categoryRepository,
        QuestionInterface $questionRepository
    ) {
        $this->postRepository = $postRepository;
        $this->categoryRepository = $categoryRepository;
        $this->questionRepository = $questionRepository;
        $this->middleware('auth')->except('index', 'show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $posts = $this->postRepository;
        switch ($request->tag) {
            case 'editors-choice':
                $posts = $posts->editorChoice();
                break;
            case 'trending':
                $posts = $posts->trending();
                break;
            case 'my-clips':
                if (Auth::check()) {
                    $posts = $this->userRepository->userPostClips(Auth::user());
                }
                break;
            default:
                $posts = $posts->newest();
                break;
        }
        $posts = $posts->with(['category', 'user', 'comments']);
        $posts = $posts->paginate(config('pagination.post'));
        $questions = $this->questionRepository->newest()->paginate(config('pagination.question'));
        $hotTag = Tag::withCount('questions')->orderBy('questions_count', 'desc');
        $hotTag = $hotTag->with('questions')->limit(config('pagination.hot_tag'))->get();

        return view('posts.index', compact('posts', 'questions', 'hotTag'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->categoryRepository->all();

        return view('posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
        $post = $this->postRepository->store($request);
        
        return redirect()->route('posts.show', ['id' => $post->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $post->with(['category', 'user', 'comments']);

        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('home');
    }
}
