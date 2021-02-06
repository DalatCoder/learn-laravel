<?php

namespace App\Http\Controllers;

use App\Category;
use App\Components\Recursive;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    private $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function index()
    {
        return view('category.index', ['categories' => $this->category->latest()->paginate(5)]);
    }

    public function create()
    {
        $categories = $this->category->all();
        $recursive = new Recursive($categories);

        return view('category.create', ['htmlSelect' => $recursive->categoryRecursive()]);
    }

    public function store(Request $request)
    {
        $this->category->create([
            'name' => $request['name'],
            'parent_id' => $request['parent_id'],
            'slug' => Str::slug(Str::lower($request['name']))
        ]);

        return redirect(route('categories.index'));
    }

    public function edit($id)
    {
        dd('edit');
    }

    public function delete($id)
    {
        dd('delete');
    }
}
