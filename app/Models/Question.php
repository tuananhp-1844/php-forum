<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Markdown;
use App\Http\Traits\FullTextSearch;

class Question extends Model
{
    use FullTextSearch;

    protected $searchable = [
        'title',
        'content',
    ];

    protected $fillable = [
        'title',
        'content',
        'user_id',
        'category_id',
        'status',
        'is_poll',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function votes()
    {
        return $this->belongsToMany(User::class, 'question_votes', 'question_id', 'user_id')->withPivot('state');
    }


    public function polls()
    {
        return $this->hasMany(Poll::class);
    }

    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag', 'question_tags', 'question_id', 'tag_id');
    }

    public function reports()
    {
        return $this->belongsToMany('App\Models\Report', 'report_users', 'question_id', 'report_id');
    }

    public function voteCount()
    {
        $count = 0;
        foreach ($this->votes as $key => $value) {
            $count += $value->pivot->state;
        }
        
        return $count;
    }

    public function clips()
    {
        return $this->belongsToMany('App\Models\User', 'clips', 'question_id', 'user_id');
    }
}
