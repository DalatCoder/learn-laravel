<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();

        return view('post', [
            'post' => $post
        ]);
    }
}
