<?php

namespace App\Http\Controllers\Questions;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\QuestionRepositoryInterface;
use App\Repositories\Contracts\CategoryRepositoryInterface;
use App\Http\Requests\Questions\CreateQuestionRequest;

class QuestionController extends Controller
{
    private $questionRepository;
    private $categoryRepository;

    public function __construct(QuestionRepositoryInterface $questionRepository, CategoryRepositoryInterface $categoryRepository) {
        $this->questionRepository = $questionRepository;
        $this->categoryRepository = $categoryRepository;
        $this->middleware('auth')->except('index', 'show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $questions = $this->questionRepository->with(['user', 'answers', 'votes']);
        switch ($request->tag) {
            case 'unresolve':
                $questions = $questions->unResolve();
                break;
            case 'poll':
                $questions = $questions->isPoll();
                break;
            case 'no-answer':
                # code...
                break;
            default:
                $questions = $questions->newest();
                break;
        }
        $questions = $questions->paginate(10);
        return view('home', compact('questions'));
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
        $question = $this->questionRepository->find($id);
        return view('questions.show', compact('question'));
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
