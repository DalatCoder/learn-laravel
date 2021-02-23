<?php

namespace App\Http\Controllers;

use App\AdminBrand;
use App\Http\Requests\BrandCreateRequest;
use Illuminate\Support\Facades\Session;

session_start();

class AdminBrandController extends Controller
{
    private $brand;

    public function __construct(AdminBrand $brand)
    {
        $this->brand = $brand;
    }

    public function index()
    {
        $brands = $this->brand->latest()->paginate(10);
        return view('admin.brand.index', compact(
            'brands'
        ));
    }

    public function create()
    {
        return view('admin.brand.add');
    }

    public function store(BrandCreateRequest $request)
    {
        $this->brand->create([
            'brand_name' => $request['brand_name'],
            'brand_desc' => $request['brand_desc'],
            'brand_status' => $request['brand_status']
        ]);

        Session::put('message-success', 'Thêm thương hiệu sản phẩm "' . $request['brand_name'] . '" thành công');
        return redirect()->route('brands.create');
    }
}
