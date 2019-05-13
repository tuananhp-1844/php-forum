<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
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
        return $this->belongsToMany(User::class, 'question_votes');
    }


    public function polls()
    {
        return $this->hasMany(Poll::class);
    }

    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag', 'question_tags', 'question_id', 'tag_id');
    }
}
