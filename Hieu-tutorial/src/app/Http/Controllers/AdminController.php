<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

session_start();

class AdminController extends Controller
{
    public function index()
    {
        return view('admin_login');
    }

    public function show_dashboard()
    {
        return view('admin.dashboard');
    }

    public function dashboard(Request $request)
    {
        $admin_email = $request['admin_email'];
        $admin_password = md5($request['admin_password']);

        $result = DB::table('tbl_admin')
            ->where('admin_email', $admin_email)
            ->where('admin_password', $admin_password)
            ->first();

        if (!empty($result)) {
            Session::put('admin_id', $result->admin_id);
            Session::put('admin_name', $result->admin_name);

            return redirect()->route('admin.dashboard');
        }

        Session::put('message', 'Thông tin đăng nhập không hợp lệ! Vui lòng nhập lại.');
        return redirect()->route('admin.home');
    }

    public function logout_admin()
    {
        Session::put('admin_id', null);
        Session::put('admin_name', null);
        
        return redirect()->route('admin.home');
    }
}
