<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $slider;
    private $category;
    private $product;

    public function __construct(Slider $slider, Category $category, Product $product)
    {
        $this->slider = $slider;
        $this->category = $category;
        $this->product = $product;
    }

    public function index()
    {
        $sliders = $this->slider->latest()->take(5)->get();
        $categories = $this->category->where('parent_id', 0)->get();
        $feature_products = $this->product->latest()->take(6)->get();
        $recommend_products_raw = $this->product->latest('view_counts', 'desc')->take(12)->get();

        $per_page = 3;
        $recommend_products = [];

        for ($i = 0; $i < ceil(count($recommend_products_raw) / 3); $i++) {
            $recommend_products[$i] = [];

            for ($j = 0; $j < 3; $j++) {
                if ($i * $per_page + $j < count($recommend_products_raw)) {
                    array_push($recommend_products[$i], $recommend_products_raw[$i * $per_page + $j]);
                }
            }
        }

        $category_tab_products = [];
        foreach ($categories as $index => $parentCategory) {
            $category_tab_products[$index] = $parentCategory->products()->latest('view_counts', 'desc')->take(5)->get();
        }

        return view('home.home', [
            'sliders' => $sliders,
            'categories' => $categories,
            'feature_products' => $feature_products,
            'recommend_products' => $recommend_products,
            'category_tab_products' => $category_tab_products
        ]);
    }
}
