<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = [
        'content',
        'user_id',
        'parent_id',
        'question_id',
        'is_best',
        'answerable_id',
        'answerable_type',
    ];

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
        return $this->morphToMany(User::class, 'votable')->withPivot('state');
    }

    public function voteCount()
    {
        $count = 0;
        foreach ($this->votes as $key => $value) {
            $count += $value->pivot->state;
        }
        
        return $count;
    }

    public function answerable()
    {
        return $this->morphTo();
    }
}
