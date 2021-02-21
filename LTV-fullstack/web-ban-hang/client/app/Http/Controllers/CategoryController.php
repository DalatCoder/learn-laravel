<?php

namespace App\Http\Controllers;

use App\Category;

class CategoryController extends Controller
{
    private $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function index($slug, $id)
    {
        $category = $this->category->findOrFail($id);

        $categories = $this->category->where('parent_id', 0)->get();
        $category_limits = $this->category->where('parent_id', 0)->take(3)->get();

        $products = $category->products()->latest()->paginate(12);

        return view('product.category.list', compact(
            'category_limits',
            'categories',
            'products'
        ));
    }
}
