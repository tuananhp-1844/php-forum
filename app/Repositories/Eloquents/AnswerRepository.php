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

    public function checkUserVote($userId, Answer $answer)
    {
        return $answer->votes()->wherePivot('state', 1)->get()->where('id', $userId)->count();
    }

    public function checkUserUnVote($userId, Answer $answer)
    {
        return $answer->votes()->wherePivot('state', -1)->get()->where('id', $userId)->count();
    }

    public function vote($userId, Answer $answer)
    {
        return $answer->votes()->attach($userId, ['state' => 1]);
    }

    public function unVote($userId, Answer $answer)
    {
        return $answer->votes()->attach($userId, ['state' => -1]);
    }
    
    public function destroyVote($userId, Answer $answer)
    {
        return $answer->votes()->detach($userId);
    }

    public function setBest(Answer $answer)
    {
        $oldBest = $answer->question->answers->where('is_best', 1);
        if ($oldBest->count()) {
            $oldBest->first()->is_best = 1;
            $oldBest->save();
        } else {
            $answer->is_best = 1;
            $answer->save();
        }
        
        return $answer;
    }
}
