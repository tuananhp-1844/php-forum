<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Poll extends Model
{
    protected $fillable = [
        'title',
        'question_id',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'poll_users', 'poll_id', 'user_id');
    }
    
    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
