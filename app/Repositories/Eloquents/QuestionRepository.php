<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Contracts\QuestionRepositoryInterface;
use App\Models\Question;
use Illuminate\Http\Request;
use Auth;

class QuestionRepository extends BaseRepository implements QuestionRepositoryInterface
{
    /**
     * Specify Model class name
     */
    public function getModel()
    {
        return Question::class;
    }

    public function newest()
    {
        return $this->model->orderBy('created_at', 'DESC');
    }
    
    public function unResolve()
    {
        return $this->model->where('is_resolve', 0)->orderBy('created_at', 'DESC');
    }

    public function isPoll()
    {
        return $this->model->where('is_poll', 1)->orderBy('created_at', 'DESC');
    }

    public function noAnswer()
    {
        // $this->model->where('is_resolve', 0)->orderBy('created_at', 'DESC');
    }

    public function store(Request $request)
    {
        $question = $this->model->create([
            'user_id' => Auth::user()->id,
            'category_id' => $request->category,
            'title' => $request->title,
            'content' => $request->content,
            'is_poll' => $request->has('question_poll') ? 1 : 0,
        ]);
        
        return $question;
    }
}
