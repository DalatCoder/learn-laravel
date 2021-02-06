<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $htmlselect;

    public function __construct()
    {
        $this->htmlselect = '';
    }

    public function index()
    {
        return view('category.index');
    }

    public function create()
    {
        $categories = Category::all();
        $this->categoryRecursive($categories, 0);

        return view('category.create', ['htmlSelect' => $this->htmlselect]);
    }

    public function categoryRecursive($categories, $id, $text = '')
    {
        foreach ($categories as $category) {
            if ($category->parent_id == $id) {
                $this->htmlselect .= '<option>' . $text . $category->name . '</option>';
                $this->categoryRecursive($categories, $category->id, $text .= '--');
            }
        }
    }
}
