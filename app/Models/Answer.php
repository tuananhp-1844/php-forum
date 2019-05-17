<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = ['content', 'user_id', 'parent_id', 'question_id', 'is_best'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function childs()
    {
        return $this->hasMany($this, 'parent_id', 'id');
    }

    public function votes()
    {
        return $this->belongsToMany(User::class, 'answer_votes', 'answer_id', 'user_id')->withPivot('state');
    }

    public function voteCount()
    {
        $count = 0;
        foreach ($this->votes as $key => $value) {
            $count += $value->pivot->state;
        }
        
        return $count;
    }

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
