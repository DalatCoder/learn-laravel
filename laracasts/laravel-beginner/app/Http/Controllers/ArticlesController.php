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

        $article = Article::findOrFail($id);
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
        \request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required'
        ]);

        // Save the new article
        $article = new Article();

        $article->title = \request('title');
        $article->excerpt = \request('excerpt');
        $article->body = \request('body');

        $article->save();

        return redirect('/articles');
    }

    public function edit($id)
    {
        // Show a view to edit an existing resource.

        $article = Article::findOrFail($id);

        return view('articles.edit', ['article' => $article]);
    }

    public function update($id)
    {
        // Persist the edited resource.

        // Validation
        \request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required'
        ]);

        $article = Article::findOrFail($id);

        $article->title = \request('title');
        $article->excerpt = \request('excerpt');
        $article->body = \request('body');

        $article->save();

        return redirect('/articles/' . $article->id);
    }

    public function destroy()
    {
        // Delete the resource.
    }

}
