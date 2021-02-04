<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['title', 'excerpt', 'body'];

    public function path()
    {
        return route('articles.show', $this->id);
    }

    public function user()
    {
        return $this->belongsTo(User::class); // SELECT * FROM users WHERE id = user_id
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
