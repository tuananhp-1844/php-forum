<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable implements MustVerifyEmail, JWTSubject
{
    use Notifiable, SoftDeletes;

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

    public function getIsAdminAttribute()
    {
        return $this->role_id === config('admin');
    }

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
