<?php
namespace App\Repositories\Contracts;

use App\Models\Question;

interface QuestionRepositoryInterface
{
    public function unResolve();
    public function isPoll();
    public function noAnswer();
    public function increaseView($id);
    public function relate(Question $question, $limit);
    public function checkUserVote($userId, Question $question);
    public function checkUserUnVote($userId, Question $question);
    public function vote($userId, Question $question);
    public function unVote($userId, Question $question);
    public function destroyVote($userId, Question $question);
    public function resolve(Question $question);
    public function progress(Question $question);
    public function checkUserClip($userId, Question $question);
    public function clip($userId, Question $question);
    public function destroyClip($userId, Question $question);
}
