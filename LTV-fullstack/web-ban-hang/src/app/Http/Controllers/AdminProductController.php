<?php

namespace App\Http\Controllers;

use App\Category;
use App\Components\Recursive;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    use StorageImageTrait;

    private $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function index()
    {
        return view('admin.product.index');
    }

    public function create()
    {
        $htmlSelect = $this->getCategoryHtmlSelection();

        return view('admin.product.create', [
            'htmlSelect' => $htmlSelect
        ]);
    }

    public function store(Request $request)
    {
        $data = $this->storageTraitUpload($request, 'feature_image_path', 'products');
        dd($data);
    }

    function getCategoryHtmlSelection($parent_id = 0): string
    {
        $categories = $this->category->all();
        $recursive = new Recursive($categories);
        return $recursive->categoryRecursive($parent_id);
    }
}
