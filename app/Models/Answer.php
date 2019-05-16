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
}
