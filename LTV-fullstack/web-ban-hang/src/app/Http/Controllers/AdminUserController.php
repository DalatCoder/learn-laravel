<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    private $user;
    private $role;

    public function __construct(User $user, Role $role)
    {
        $this->user = $user;
        $this->role = $role;
    }

    public function index()
    {
        $users = $this->user->latest()->paginate(10);
        return view('admin.user.index', [
            'users' => $users
        ]);
    }

    public function create()
    {
        $roles = $this->role->all();
        return view('admin.user.create', [
            'roles' => $roles
        ]);
    }
}
