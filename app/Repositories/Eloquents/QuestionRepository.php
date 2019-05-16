<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Contracts\QuestionRepositoryInterface;
use App\Models\Question;
use App\Models\Tag;
use App\Models\Poll;
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

        if ($request->has('tags')) {
            $tagRequest = explode(',', $request->tags);
            $tags = Tag::all();
            $tagId = [];
            foreach ($tagRequest as $key => $value) {
                if ($tags->where('name', $value)->count()) {
                    $tagId[] = $tags->where('name', $value)->first()->id;
                } else {
                    $tag = Tag::create([
                        'name' => $value,
                    ]);
                    $tagId[] = $tag->id;
                }
            }
            $question->tags()->attach($tagId);
        }

        if ($request->has('question_poll')) {
            foreach ($request->ask as $key => $value) {
                $poll = Poll::create([
                    'question_id' => $question->id,
                    'title' => $value['title'],
                ]);
            }
        }

        return $question;
    }

    public function increaseView($id)
    {
        $question = $this->model->findOrFail($id);
        $question->view += 1;
        $question->save();

        return $question;
    }

    public function relate(Question $question, $limit)
    {
        $questions = $this->model->where('category_id', $question->category_id)->orderBy('id', 'DESC');
        $questions = $questions->where('id', '<>', $question->id)->limit($limit)->get();

        return $questions;
    }

    public function checkUserVote($userId, Question $question)
    {
        return $question->votes()->wherePivot('state', 1)->get()->where('id', $userId)->count();
    }

    public function checkUserUnVote($userId, Question $question)
    {
        return $question->votes()->wherePivot('state', -1)->get()->where('id', $userId)->count();
    }

    public function vote($userId, Question $question)
    {
        return $question->votes()->attach($userId, ['state' => 1]);
    }

    public function unVote($userId, Question $question)
    {
        return $question->votes()->attach($userId, ['state' => -1]);
    }
    
    public function destroyVote($userId, Question $question)
    {
        return $question->votes()->detach($userId);
    }
}
