<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Markdown;
use App\Http\Traits\FullTextSearch;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use FullTextSearch, SoftDeletes;

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
        return $this->belongsTo(User::class)->withTrashed();
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function answers()
    {
        return $this->morphMany(Answer::class, 'answerable');
    }

    public function votes()
    {
        return $this->morphToMany(User::class, 'votable')->withPivot('state');
    }


    public function polls()
    {
        return $this->hasMany(Poll::class);
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function reports()
    {
        return $this->belongsToMany('App\Models\Report', 'report_users', 'question_id', 'report_id')->withPivot('comment');
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
        return $this->morphToMany(User::class, 'clippable');
    }
}
