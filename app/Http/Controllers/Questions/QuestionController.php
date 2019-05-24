<?php

namespace App\Http\Controllers\Questions;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\QuestionRepositoryInterface as QuestionInterface;
use App\Repositories\Contracts\CategoryRepositoryInterface as CategoryInterface;
use App\Repositories\Contracts\UserRepositoryInterface as UserInterface;
use App\Repositories\Contracts\AnswerRepositoryInterface as AnswerInterface;
use App\Http\Requests\Questions\CreateQuestionRequest;
use App\Http\Requests\Questions\UpdateQuestion;
use Auth;
use App\Models\Tag;
use App\Models\Question;

class QuestionController extends Controller
{
    private $questionRepository;
    private $categoryRepository;
    private $userRepository;
    private $answerRepository;

    public function __construct(
        QuestionInterface $question,
        CategoryInterface $category,
        UserInterface $user,
        AnswerInterface $answerRepository
    ) {
        $this->questionRepository = $question;
        $this->categoryRepository = $category;
        $this->userReponsitory = $user;
        $this->answerRepository = $answerRepository;
        $this->middleware('auth')->except('index', 'show');
        $this->middleware('can:update,question')->only(['update', 'edit']);
        $this->middleware('can:delete,question')->only('destroy');
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
                $questions = $questions->noAnswer();
                break;
            default:
                $questions = $questions->newest();
                break;
        }
        $questions = $questions->with(['category', 'user', 'answers', 'votes']);
        $questions = $questions->paginate(config('pagination.question'));
        $questions = $questions->appends(request()->input());
        $userHightPoint = $this->userReponsitory->getHighestPoint(config('pagination.user_hight_point'));
        $hotTag = Tag::withCount('questions')->orderBy('questions_count', 'desc');
        $hotTag = $hotTag->with('questions')->limit(config('pagination.hot_tag'))->get();

        return view('home', compact('questions', 'userHightPoint', 'hotTag'));
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
        $question = $question->load(['user', 'votes', 'tags', 'polls.users']);
        $this->questionRepository->increaseView($id);
        $relate = $this->questionRepository->relate($question, config('pagination.question'));
        $questionClips = [];
        if (Auth::check()) {
            $questionClips = Auth::user()->clips->sortBy('id')->take(config('paginate.question'));
        }
        $comments = $question->answers()->orderBy('id', 'DESC')->where('parent_id', 0)->where('is_best', 0);
        $comments = $comments->with('user', 'childs', 'votes', 'question')->paginate(config('pagination.comment'));
        $bestComment = $question->answers()->where('is_best', 1)->first();

        return view('questions.show', compact('question', 'relate', 'questionClips', 'comments', 'bestComment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        $categories = $this->categoryRepository->all();

        return view('questions.edit', compact('question', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateQuestion $request, Question $question)
    {
        $question = $this->questionRepository->updateQuestion($request, $question);

        return redirect()->route('questions.show', ['question' => $question->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        $question->delete();

        return redirect()->route('home');
    }
}
