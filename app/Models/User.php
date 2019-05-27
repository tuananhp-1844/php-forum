<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'first_name',
        'last_name',
        'role_id',
        'avatar',
        'website',
        'facebook',
        'google',
        'linker',
        'twitter',
        'country',
        'info',
        'provider_id',
        'provider',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function answers()
    {
        return $this->morphMany(Answer::class, 'answerable');
    }

    public function votes()
    {
        return $this->morphedByMany(Question::class, 'votable')->withPivot('state');
    }

    public function clips()
    {
        return $this->morphedByMany(Question::class, 'clippable');
    }
    
    public function postClips()
    {
        return $this->morphedByMany(Post::class, 'clippable');
    }

    public function voteAnswers()
    {
        return $this->morphedByMany(Answer::class, 'votable')->withPivot('state');
    }
}
