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

        return view('home.home', [
            'sliders' => $sliders,
            'categories' => $categories,
            'feature_products' => $feature_products
        ]);
    }
}
