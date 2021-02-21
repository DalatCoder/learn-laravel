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
        return view('admin.category.index');
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
        Session::put('message', 'Thêm danh mục sản phẩm thành công');
        return redirect()->route('categories.create');
    }
}
