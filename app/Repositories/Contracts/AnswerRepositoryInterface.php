<?php
namespace App\Repositories\Contracts;

use App\Models\Question;
use App\Models\Answer;
use Illuminate\Http\Request;

interface AnswerRepositoryInterface
{
    public function store(Request $request, Question $question);
    public function checkUserVote($userId, Answer $answer);
    public function checkUserUnVote($userId, Answer $answer);
    public function vote($userId, Answer $answer);
    public function unVote($userId, Answer $answer);
    public function destroyVote($userId, Answer $answer);
    public function setBest(Answer $answer);
}
