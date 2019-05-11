<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'name',
    ];

    public function questions()
    {
        return $this->belongsToMany('App\Models\Question', 'question_tags', 'tag_id', 'question_id');
    }
}
