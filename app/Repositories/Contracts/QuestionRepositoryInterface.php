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
}
