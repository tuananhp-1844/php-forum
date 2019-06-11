<?php

namespace App\Http\Controllers\Profile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Http\Requests\Profile\EditProfile as EditProfileRequest;
use Auth;

class ProfileController extends Controller
{
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = $this->userRepository->getQuestion(Auth::user()->id, config('pagination.question'));
        
        return view('profile.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('profile.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditProfileRequest $request)
    {
        $user = $this->userRepository->updateUser(Auth::user()->id, $request);

        return redirect()->route('profile.index');
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

    public function clip()
    {
        $questions = Auth::user()->clips()->with('votes', 'category', 'answers', 'user');
        $questions = $questions->paginate(config('pagination.question'));

        return view('profile.clip', compact('questions'));
    }

    public function question()
    {
        $questions = Auth::user()->questions()->with('votes', 'category', 'answers', 'user');
        $questions = $questions->paginate(config('pagination.question'));

        return view('profile.question', compact('questions'));
    }

    public function post()
    {
        $posts = Auth::user()->posts()->with('category', 'comments', 'user');
        $posts = $posts->paginate(config('pagination.question'));

        return view('profile.post', compact('posts'));
    }
}
