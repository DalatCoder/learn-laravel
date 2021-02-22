<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryCreateRequest;
use App\Http\Requests\CategoryUpdateRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

session_start();

class AdminCategoryController extends Controller
{
    public function index()
    {
        $categories = DB::table('tbl_category')->whereNull('deleted_at')->latest()->paginate(10);

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

        $message = 'Hiển thị danh mục "' . $category_name . '" thành công!';

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

        $message = 'Ẩn danh mục "' . $category_name . '" thành công!';

        Session::put('message-success', $message);
        return redirect()->route('categories.index');
    }

    public function edit($id)
    {
        $category = $category = DB::table('tbl_category')->where('category_id', $id)->first();
        if (empty($category)) abort(404);

        return view('admin.category.edit', compact(
            'category'
        ));
    }

    public function update(CategoryUpdateRequest $request, $id)
    {
        $category = $category = DB::table('tbl_category')->where('category_id', $id);
        if (empty($category->first())) abort(404);

        $data = [
            'category_name' => $request['category_name'],
            'category_desc' => $request['category_desc'],
            'category_status' => $request['category_status']
        ];

        $category->update($data);

        Session::put('message-success', 'Cập nhật danh mục sản phẩm "' . $request['category_name'] . '" thành công');
        return redirect()->route('categories.index');
    }

    public function delete($id)
    {
        $category = $category = DB::table('tbl_category')->where('category_id', $id);
        if (empty($category->first())) abort(404);

        $category->update(['deleted_at' => Carbon::now()]);

        Session::put('message-success', 'Xóa danh mục sản phẩm "' . $category->first()->category_name . '" thành công');
        return redirect()->route('categories.index');
    }
}
