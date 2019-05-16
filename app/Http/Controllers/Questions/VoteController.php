<?php
namespace App\Http\Controllers\Questions;

use Illuminate\Http\Request;
use App\Models\Question;
use Auth;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\QuestionRepositoryInterface;

class VoteController extends Controller
{
    protected $questionRepository;
    public function __construct(QuestionRepositoryInterface $questionRepository)
    {
        $this->questionRepository = $questionRepository;
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Question $question)
    {
        return $this->questionRepository->checkUserVote(Auth::user()->id, $question);
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
    public function store(Request $request, Question $question)
    {
        $state = 0;
        if ($this->questionRepository->checkUserUnVote(Auth::user()->id, $question)) {
            $this->questionRepository->destroyVote(Auth::user()->id, $question);
            $state = -1;
        } elseif ($this->questionRepository->checkUserVote(Auth::user()->id, $question)) {
            $this->questionRepository->destroyVote(Auth::user()->id, $question);
            $state = 0;
        } else {
            $this->questionRepository->vote(Auth::user()->id, $question);
            $state = 1;
        }

        return $state;
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
    public function destroy(Question $question, $id)
    {
        $state = 0;
        if ($this->questionRepository->checkUserUnVote(Auth::user()->id, $question)) {
            $this->questionRepository->destroyVote(Auth::user()->id, $question);
            $state = 0;
        } elseif ($this->questionRepository->checkUserVote(Auth::user()->id, $question)) {
            $this->questionRepository->destroyVote(Auth::user()->id, $question);
            $state = 1;
        } else {
            $this->questionRepository->unVote(Auth::user()->id, $question);
            $state = -1;
        }
        
        return $state;
    }
}
