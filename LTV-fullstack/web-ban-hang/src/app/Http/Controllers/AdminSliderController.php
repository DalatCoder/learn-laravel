<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminSliderController extends Controller
{
    public function index()
    {
        return view('admin.slider.index');
    }

    public function create()
    {
        return view('admin.slider.create');
    }
}
