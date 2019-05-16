<?php
namespace App\Repositories\Contracts;

use App\Models\Question;
use Illuminate\Http\Request;

interface AnswerRepositoryInterface
{
    public function store(Request $request, Question $question);
}
