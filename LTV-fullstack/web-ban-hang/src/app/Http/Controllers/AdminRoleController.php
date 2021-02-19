<?php

namespace App\Http\Controllers;

use App\Permission;
use App\Role;
use Illuminate\Http\Request;

class AdminRoleController extends Controller
{
    private $role;
    private $permission;

    public function __construct(Role $role, Permission $permission)
    {
        $this->role = $role;
        $this->permission = $permission;
    }

    public function index()
    {
        $roles = $this->role->latest()->paginate(10);
        return view('admin.role.index', [
            'roles' => $roles
        ]);
    }

    public function create()
    {
        $permissionParents = $this->permission->where('parent_id', 0)->get();
        return view('admin.role.create', [
            'permissionParents' => $permissionParents
        ]);
    }
}
