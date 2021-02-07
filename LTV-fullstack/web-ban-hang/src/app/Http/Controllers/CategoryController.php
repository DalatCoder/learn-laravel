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
        return view('admin.category.index', ['categories' => $this->category->latest()->paginate(5)]);
    }

    public function create()
    {
        return view('admin.category.create', ['htmlSelect' => $this->getCategoryHtmlSelection()]);
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

    function getCategoryHtmlSelection($parent_id = 0): string
    {
        $categories = $this->category->all();
        $recursive = new Recursive($categories);
        return $recursive->categoryRecursive($parent_id);
    }

    public function edit($id)
    {
        $category = $this->category->findOrFail($id);
        $htmlSelect = $this->getCategoryHtmlSelection($category->parent_id);

        return view('admin.category.edit', ['category' => $category, 'htmlSelect' => $htmlSelect]);
    }

    public function update($id, Request $request)
    {
        $category = $this->category->findOrFail($id);

        $category->update([
            'name' => $request['name'],
            'parent_id' => $request['parent_id'],
            'slug' => Str::slug(Str::lower($request['name']))
        ]);

        return redirect(route('categories.index'));
    }

    public function delete($id)
    {
        $category = $this->category->findOrFail($id);
        $category->delete();

        return redirect(route('categories.index'));
    }
}
