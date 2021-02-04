<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function index()
    {
        // Render a list of a resource.

        $articles = Article::latest()->paginate(5);
        return view('articles.index', ['articles' => $articles]);
    }

    public function show($id)
    {
        // Show a single resource.

        $article = Article::find($id);
        return view('articles.show', ['article' => $article]);
    }

    public function create()
    {
        // Show a view to create a new resource.

        return view('articles.create');
    }

    public function store()
    {
        // Persist the new resource.

        // Validation

        // Save the new article-
        $article = new Article();

        $article->title = \request('title');
        $article->excerpt = \request('excerpt');
        $article->body = \request('body');

        $article->save();

        return redirect('/articles');
    }

    public function edit()
    {
        // Show a view to edit an existing resource.
    }

    public function update()
    {
        // Persist the edited resource.
    }

    public function destroy()
    {
        // Delete the resource.
    }

}
