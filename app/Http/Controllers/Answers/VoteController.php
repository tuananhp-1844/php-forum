<?php

namespace App\Http\Controllers\Answers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Answer;
use Auth;
use App\Repositories\Contracts\AnswerRepositoryInterface;
use App\Repositories\Contracts\UserRepositoryInterface as UserInterface;

class VoteController extends Controller
{
    private $answerRepository;
    protected $userRepository;
    public function __construct(AnswerRepositoryInterface $answerRepository, UserInterface $userRepository)
    {
        $this->middleware('auth');
        $this->userRepository = $userRepository;
        $this->answerRepository = $answerRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request, Answer $answer)
    {
        $state = 0;
        if ($this->answerRepository->checkUserUnVote(Auth::user()->id, $answer)) {
            $this->answerRepository->destroyVote(Auth::user()->id, $answer);
            $this->userRepository->addPoint($answer->user, 'dislike_answer');
            $state = -1;
        } elseif ($this->answerRepository->checkUserVote(Auth::user()->id, $answer)) {
            $this->answerRepository->destroyVote(Auth::user()->id, $answer);
            $this->userRepository->addPoint($answer->user, 'dislike_answer');
            $state = 0;
        } else {
            $this->answerRepository->vote(Auth::user()->id, $answer);
            $this->userRepository->addPoint($answer->user, 'like_answer');
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
    public function destroy(Answer $answer, $id)
    {
        $state = 0;
        if ($this->answerRepository->checkUserUnVote(Auth::user()->id, $answer)) {
            $this->answerRepository->destroyVote(Auth::user()->id, $answer);
            $state = 0;
        } elseif ($this->answerRepository->checkUserVote(Auth::user()->id, $answer)) {
            $this->answerRepository->destroyVote(Auth::user()->id, $answer);
            $state = 1;
        } else {
            $this->answerRepository->unVote(Auth::user()->id, $answer);
            $state = -1;
        }
        $this->userRepository->addPoint($answer->user, 'dislike_answer');
        
        return $state;
    }
}
