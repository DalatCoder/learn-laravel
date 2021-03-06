<?php

namespace App\Http\Controllers;

use App\Components\MenuRecursive;
use App\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class MenuController extends Controller
{
    private $menuRecursive;
    private $menu;

    public function __construct(MenuRecursive $menuRecursive, Menu $menu)
    {
        $this->menuRecursive = $menuRecursive;
        $this->menu = $menu;
    }

    public function index()
    {
        return view('admin.menus.index', ['menus' => $this->menu->latest()->paginate(10)]);
    }

    public function create()
    {
        $optionSelect = $this->menuRecursive->menuRecursiveAdd();
        return view('admin.menus.create', ['optionSelect' => $optionSelect]);
    }

    public function store(Request $request)
    {
        $this->menu->create([
            'name' => $request['name'],
            'parent_id' => $request['parent_id'],
            'slug' => Str::slug(Str::lower($request['name']))
        ]);

        return redirect(route('menus.index'));
    }

    public function edit($id)
    {
        $menu = $this->menu->findOrFail($id);

        $optionSelect = $this->menuRecursive->menuRecursiveEdit($menu->parent_id);
        return view('admin.menus.edit', ['menu' => $menu, 'optionSelect' => $optionSelect]);
    }

    public function update($id, Request $request)
    {
        $menu = $this->menu->findOrFail($id);
        $menu->update([
            'name' => $request['name'],
            'parent_id' => $request['parent_id'],
            'slug' => Str::slug(Str::lower($request['name']))
        ]);

        return redirect(route('menus.index'));
    }

    public function delete($id)
    {
        $menu = $this->menu->findOrFail($id);

        try {
            $menu->delete();
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
}
