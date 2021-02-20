<?php

namespace App\Http\Controllers;

use App\Category;
use App\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $slider;
    private $category;

    public function __construct(Slider $slider, Category $category)
    {
        $this->slider = $slider;
        $this->category = $category;
    }

    public function index()
    {
        $sliders = $this->slider->latest()->take(5)->get();
        $categories = $this->category->where('parent_id', 0)->get();

        return view('home.home', [
            'sliders' => $sliders,
            'categories' => $categories
        ]);
    }
}
