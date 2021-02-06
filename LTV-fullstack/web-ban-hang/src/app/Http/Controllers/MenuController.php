<?php

namespace App\Http\Controllers;

use App\Components\MenuRecursive;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    private $menuRecursive;

    public function __construct(MenuRecursive $menuRecursive)
    {
        $this->menuRecursive = $menuRecursive;
    }

    public function index()
    {
        return view('menus.index');
    }

    public function create()
    {
        $optionSelect = $this->menuRecursive->menuRecursiveAdd();
        return view('menus.create', ['optionSelect' => $optionSelect]);
    }

    public function store(Request $request)
    {

    }
}
