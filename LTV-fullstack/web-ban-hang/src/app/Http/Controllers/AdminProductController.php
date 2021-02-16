<?php

namespace App\Http\Controllers;

use App\Category;
use App\Components\Recursive;
use App\Http\Requests\ProductAddRequest;
use App\Product;
use App\ProductImage;
use App\ProductTag;
use App\Tag;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AdminProductController extends Controller
{
    use StorageImageTrait;

    private $category;
    private $product;
    private $productImage;
    private $tag;
    private $productTag;

    public function __construct(Category $category, Product $product, ProductImage $productImage, Tag $tag, ProductTag $productTag)
    {
        $this->category = $category;
        $this->product = $product;
        $this->productImage = $productImage;
        $this->tag = $tag;
        $this->productTag = $productTag;
    }

    public function index()
    {
        $products = $this->product->latest()->paginate(5);
        return view('admin.product.index', [
            'products' => $products
        ]);
    }

    public function create()
    {
        $htmlSelect = $this->getCategoryHtmlSelection();

        return view('admin.product.create', [
            'htmlSelect' => $htmlSelect
        ]);
    }

    public function store(ProductAddRequest $request)
    {
        try {
            DB::beginTransaction();

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
            $product = $this->product->create($dataProductCreate);// Save list of detail images
            if ($request->has('image_path')) {
                foreach ($request['image_path'] as $item) {
                    $dataProductImageDetail = $this->storageTraitUploadMultiple($item, 'products');
                    $product->images()->create([
                        'image_path' => $dataProductImageDetail['file_path'],
                        'image_name' => $dataProductImageDetail['file_name']
                    ]);
                }
            }// Save list of tags
            if ($request->has('tags')) {
                $tagIds = [];
                foreach ($request['tags'] as $item) {
                    // Save to tags table
                    $tag = $this->tag->firstOrCreate([
                        'name' => $item
                    ]);

                    array_push($tagIds, $tag->id);
                }

                // Save to product_tags table
                $product->tags()->attach($tagIds);
            }

            DB::commit();

            return redirect()->route('products.index');
        } catch (\Exception $e) {
            DB::rollBack();

            $message = 'Message: ' . $e->getMessage() . '. Line: ' . $e->getLine();
            Log::error($message);
        }
    }

    public function edit($id)
    {
        $product = $this->product->findOrFail($id);
        $htmlSelect = $this->getCategoryHtmlSelection($product->category_id);

        return view('admin.product.edit', [
            'htmlSelect' => $htmlSelect,
            'product' => $product
        ]);
    }

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();

            $dataProductUpdate = [
                'name' => $request['name'],
                'price' => $request['price'],
                'content' => $request['description'],
                'user_id' => auth()->id(),
                'category_id' => $request['category_id']
            ];

            $featureImage = $this->storageTraitUpload($request, 'feature_image_path', 'products');
            if (!empty($featureImage)) {
                $dataProductUpdate['feature_image_name'] = $featureImage['file_name'];
                $dataProductUpdate['feature_image_path'] = $featureImage['file_path'];
            }

            $product = $this->product->findOrFail($id);
            $product->update($dataProductUpdate);// Save list of detail images

            if ($request->has('image_path')) {
                $this->productImage->where('product_id', $id)->delete();

                foreach ($request['image_path'] as $item) {
                    $dataProductImageDetail = $this->storageTraitUploadMultiple($item, 'products');
                    $product->images()->create([
                        'image_path' => $dataProductImageDetail['file_path'],
                        'image_name' => $dataProductImageDetail['file_name']
                    ]);
                }
            }// Save list of tags
            if ($request->has('tags')) {
                $tagIds = [];
                foreach ($request['tags'] as $item) {
                    // Save to tags table
                    $tag = $this->tag->firstOrCreate([
                        'name' => $item
                    ]);

                    array_push($tagIds, $tag->id);
                }

                // Save to product_tags table
                $product->tags()->sync($tagIds);
            }

            DB::commit();

            return redirect()->route('products.index');
        } catch (\Exception $e) {
            DB::rollBack();

            $message = 'Message: ' . $e->getMessage() . '. Line: ' . $e->getLine();
            Log::error($message);
        }
    }

    public function delete($id)
    {
        try {
            $this->product->findOrFail($id)->delete();

            return response()->json([
                'code' => 200,
                'message' => 'success'
            ], 200);
        } catch (\Exception $e) {
            $message = 'Message: ' . $e->getMessage() . '. Line: ' . $e->getLine();
            Log::error($message);

            return response()->json([
                'code' => 500,
                'message' => 'fail'
            ], 500);
        }
    }

    function getCategoryHtmlSelection($parent_id = 0): string
    {
        $categories = $this->category->all();
        $recursive = new Recursive($categories);
        return $recursive->categoryRecursive($parent_id);
    }
}
