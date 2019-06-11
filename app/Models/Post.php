<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    public function getStatusAttribute($status)
    {
        switch ($status) {
            case config('post.editor_choice'):
                return 'Editor choice';
                break;
            case config('post.trending'):
                return 'Trending';
                break;
            default:
                return 'Normal';
                break;
        }
    }

    protected $fillable = [
        'title',
        'user_id',
        'category_id',
        'content',
        'view',
        'status',
        'slug',
    ];

    public function user()
    {
        return $this->belongsTo(User::class)->withTrashed();
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function comments()
    {
        return $this->morphMany(Answer::class, 'answerable');
    }

    public function clips()
    {
        return $this->morphToMany(User::class, 'clippable');
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
}
