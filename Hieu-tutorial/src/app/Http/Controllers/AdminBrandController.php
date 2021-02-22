<?php

namespace App\Http\Controllers;

use App\AdminBrand;
use Illuminate\Http\Request;

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

    public function store()
    {

    }
}
