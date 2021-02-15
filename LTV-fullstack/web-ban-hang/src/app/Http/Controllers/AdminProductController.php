<?php

namespace App\Http\Controllers;

use App\Category;
use App\Components\Recursive;
use App\Product;
use App\ProductImage;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    use StorageImageTrait;

    private $category;
    private $product;
    private $productImage;

    public function __construct(Category $category, Product $product, ProductImage $productImage)
    {
        $this->category = $category;
        $this->product = $product;
        $this->productImage = $productImage;
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
        $dataProductCreate = [
            'name' => $request['name'],
            'price' => $request['price'],
            'content' => $request['description'],
            'user_id' => auth()->id(),
            'category_id' => $request['category_id']
        ];

        $featureImage = $this->storageTraitUpload($request, 'feature_image_path', 'products');
        if (!empty($featureImage)) {
            $dataProductCreate['feature_image_name'] = $featureImage['file_name'];
            $dataProductCreate['feature_image_path'] = $featureImage['file_path'];
        }

        $product = $this->product->create($dataProductCreate);

        // Save list of detail images
        if ($request->has('image_path')) {
            foreach ($request['image_path'] as $item) {
                $dataProductImageDetail = $this->storageTraitUploadMultiple($item, 'products');
                $product->images()->create([
                    'image_path' => $dataProductImageDetail['file_path'],
                    'image_name' => $dataProductImageDetail['file_name']
                ]);
            }
        }
    }

    function getCategoryHtmlSelection($parent_id = 0): string
    {
        $categories = $this->category->all();
        $recursive = new Recursive($categories);
        return $recursive->categoryRecursive($parent_id);
    }
}
