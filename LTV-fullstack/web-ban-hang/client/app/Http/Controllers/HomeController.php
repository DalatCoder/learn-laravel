<?php

namespace App\Http\Controllers;

use App\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $slider;
    public function __construct(Slider $slider)
    {
        $this->slider = $slider;
    }

    public function index()
    {
        $sliders = $this->slider->latest()->take(5)->get();
        return view('home.home', [
            'sliders' => $sliders
        ]);
    }
}
