<?php

namespace App\Http\Controllers;

use App\AdminCategory;
use App\Http\Requests\CategoryCreateRequest;
use App\Http\Requests\CategoryUpdateRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

session_start();

class AdminCategoryController extends Controller
{
    private $adminCategory;

    public function __construct(AdminCategory $adminCategory)
    {
        $this->adminCategory = $adminCategory;
    }

    public function index()
    {
        $categories = $this->adminCategory->latest()->paginate(10);

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

        $this->adminCategory->create($data);

        Session::put('message-success', 'Thêm danh mục sản phẩm "' . $request['category_name'] . '" thành công');
        return redirect()->route('categories.create');
    }

    public function active_status($id)
    {
        $category = $this->adminCategory->findOrFail($id);

        $category->update([
            'category_status' => 1
        ]);

        $message = 'Hiển thị danh mục "' . $category->category_name . '" thành công!';

        Session::put('message-success', $message);
        return redirect()->route('categories.index');
    }

    public function inactive_status($id)
    {
        $category = $this->adminCategory->findOrFail($id);

        $category->update([
            'category_status' => 0
        ]);

        $message = 'Ẩn danh mục "' . $category->category_name . '" thành công!';

        Session::put('message-success', $message);
        return redirect()->route('categories.index');
    }

    public function edit($id)
    {
        $category = $this->adminCategory->findOrFail($id);

        return view('admin.category.edit', compact(
            'category'
        ));
    }

    public function update(CategoryUpdateRequest $request, $id)
    {
        $category = $this->adminCategory->findOrFail($id);

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
        $category = $this->adminCategory->findOrFail($id);

        $category_name = $category->category_name;
        $category->delete();

        Session::put('message-success', 'Xóa danh mục sản phẩm "' . $category_name . '" thành công');
        return redirect()->route('categories.index');
    }
}
