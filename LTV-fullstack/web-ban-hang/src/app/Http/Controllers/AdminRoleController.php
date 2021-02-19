<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleAddRequest;
use App\Permission;
use App\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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

    public function store(RoleAddRequest $request)
    {
        try {
            DB::beginTransaction();

            $role = $this->role->create([
                'name' => $request['name'],
                'display_name' => $request['display_name'],
            ]);

            if ($request->has('permission_ids')) {
                $role->permissions()->attach($request['permission_ids']);
            }

            DB::commit();

            return redirect()->route('roles.index');
        } catch (\Exception $e) {
            DB::rollBack();

            $message = 'Message: ' . $e->getMessage() . '. Line: ' . $e->getLine();
            Log::error($message);
        }
    }

    public function edit($id)
    {
        $role = $this->role->findOrFail($id);
        $role_permissions = $role->permissions;
        $permissionParents = $this->permission->where('parent_id', 0)->get();

        return view('admin.role.edit', [
            'role' => $role,
            'role_permissions' => $role_permissions,
            'permissionParents' => $permissionParents
        ]);
    }
}
