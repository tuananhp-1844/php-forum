<?php

namespace App\Http\Controllers\Questions;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\QuestionRepositoryInterface as QuestionInterface;
use App\Repositories\Contracts\CategoryRepositoryInterface as CategoryInterface;
use App\Repositories\Contracts\UserRepositoryInterface as UserInterface;
use App\Http\Requests\Questions\CreateQuestionRequest;

class QuestionController extends Controller
{
    private $questionRepository;
    private $categoryRepository;
    private $userRepository;

    public function __construct(QuestionInterface $question, CategoryInterface $category, UserInterface $user)
    {
        $this->questionRepository = $question;
        $this->categoryRepository = $category;
        $this->userReponsitory = $user;
        $this->middleware('auth')->except('index', 'show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $questions = $this->questionRepository;
        switch ($request->tag) {
            case 'unresolve':
                $questions = $questions->unResolve();
                break;
            case 'poll':
                $questions = $questions->isPoll();
                break;
            case 'no-answer':
                $questions = $questions->newest();
                break;
            default:
                $questions = $questions->newest();
                break;
        }
        $questions = $questions->with(['category', 'user', 'answers', 'votes']);
        $questions = $questions->paginate(config('pagination.question'));
        $userHightPoint = $this->userReponsitory->getHighestPoint(config('pagination.user_hight_point'));

        return view('home', compact('questions', 'userHightPoint'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->categoryRepository->all();

        return view('questions.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateQuestionRequest $request)
    {
        $question = $this->questionRepository->store($request);

        return redirect()->route('questions.show', ['id' => $question->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $question = $this->questionRepository->findOrFail($id);
        $question = $question->load(['user', 'answers.user', 'votes', 'tags', 'polls']);
        $this->questionRepository->increaseView($id);
        $relate = $this->questionRepository->relate($question, config('pagination.question'));

        return view('questions.show', compact('question', 'relate'));
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
    public function destroy($id)
    {
        //
    }
}
