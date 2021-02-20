<?php

namespace App\Http\Controllers;

use App\Http\Requests\PermissionAddRequest;
use App\Http\Requests\ProductAddRequest;
use App\Permission;
use Illuminate\Http\Request;

class AdminPermissionController extends Controller
{
    private $permission;

    public function __construct(Permission $permission)
    {
        $this->permission = $permission;
    }

    public function create()
    {
        $table_modules = config('permission.module_parents');
        $module_children = config('permission.module_children');

        return view('admin.permission.create', [
            'table_modules' => $table_modules,
            'module_children' => $module_children
        ]);
    }

    public function store(PermissionAddRequest $request)
    {
        $pieces = explode("@", $request->get('module_parent'));
        $name_english = $pieces[0];
        $name_vietnamese = $pieces[1];

        $permission = $this->permission->create([
            'name' => $name_english,
            'display_name' => $name_vietnamese,
            'parent_id' => 0,
            'key_code' => ''
        ]);

        if ($request->has('module_children')) {
            foreach ($request['module_children'] as $module_child) {
                $pieces = explode("@", $module_child);
                $this->permission->create([
                    'name' => $pieces[0],
                    'display_name' => $pieces[1],
                    'parent_id' => $permission->id,
                    'key_code' => $pieces[0] . '_' . $name_english
                ]);
            }
        }

        return redirect()->to('/home');
    }
}
