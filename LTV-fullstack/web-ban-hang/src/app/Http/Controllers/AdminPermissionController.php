<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminPermissionController extends Controller
{
    public function create()
    {
        return view('admin.permission.create');
    }
}
