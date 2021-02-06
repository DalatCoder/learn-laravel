<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        return view('menus.index');
    }

    public function create()
    {
        return view('menus.create');
    }

    public function store(Request $request)
    {

    }
}
