<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $table = 'posts';
    protected $primaryKey = 'id';

    protected $fillable = [
      'title',
      'body'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}

