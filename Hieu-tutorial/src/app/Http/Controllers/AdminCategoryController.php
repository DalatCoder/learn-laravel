<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryCreateRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

session_start();

class AdminCategoryController extends Controller
{
    public function index()
    {
        $categories = DB::table('tbl_category')->latest()->paginate(10);

        return view('admin.category.index', compact(
            'categories'
        ));
    }

    public function create()
    {
        return view('admin.category.add');
    }

    public function store(CategoryCreateRequest $request)
    {
        $data = [
            'category_name' => $request['category_name'],
            'category_desc' => $request['category_desc'],
            'category_status' => $request['category_status']
        ];

        DB::table('tbl_category')->insert($data);
        Session::put('message-success', 'Thêm danh mục sản phẩm "' . $request['category_name'] . '" thành công');
        return redirect()->route('categories.create');
    }

    public function active_status($id)
    {
        $category = DB::table('tbl_category')->where('category_id', $id);
        if (empty($category)) abort(404);

        $category->update([
            'category_status' => 1
        ]);

        $category_name = $category->first()->category_name;

        $message = 'Hiển thị danh mục "'. $category_name .'" thành công!';

        Session::put('message-success', $message);
        return redirect()->route('categories.index');
    }

    public function inactive_status($id)
    {
        $category = DB::table('tbl_category')->where('category_id', $id);
        if (empty($category)) abort(404);

        $category->update([
            'category_status' => 0
        ]);

        $category_name = $category->first()->category_name;

        $message = 'Ẩn danh mục "'. $category_name .'" thành công!';

        Session::put('message-success', $message);
        return redirect()->route('categories.index');
    }
}
