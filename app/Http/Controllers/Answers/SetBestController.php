<?php

namespace App\Http\Controllers\Answers;

use Illuminate\Http\Request;
use App\Models\Answer;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\AnswerRepositoryInterface;
use App\Repositories\Contracts\UserRepositoryInterface as UserInterface;

class SetBestController extends Controller
{
    protected $answerRepository;
    protected $userRepository;
    public function __construct(AnswerRepositoryInterface $answerRepository, UserInterface $userRepository)
    {
        $this->answerRepository = $answerRepository;
        $this->userRepository = $userRepository;
        $this->middleware('can:setBestAnswer,answer')->only('index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Answer $answer)
    {
        $this->answerRepository->setBest($answer);
        $this->userRepository->addPoint($answer->user, 'best_answer');

        return redirect()->route('questions.show', ['question' => $answer->answerable->id]);
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
