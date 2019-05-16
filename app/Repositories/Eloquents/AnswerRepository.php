<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Contracts\AnswerRepositoryInterface;
use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;
use Auth;

class AnswerRepository extends BaseRepository implements AnswerRepositoryInterface
{
    /**
     * Specify Model class name
     */
    public function getModel()
    {
        return Answer::class;
    }

    public function store(Request $request, Question $question)
    {
        return Answer::create([
            'content' => $request->content,
            'parent_id' => $request->parent_id,
            'user_id' => Auth::user()->id,
            'question_id' => $question->id,
        ]);
    }
}
