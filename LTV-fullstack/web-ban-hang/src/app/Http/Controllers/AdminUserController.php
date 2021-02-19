<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserAddRequest;
use App\Role;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

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

    public function store(UserAddRequest $request)
    {
        try {
            DB::beginTransaction();

            $user = $this->user->create([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => Hash::make($request['password'])
            ]);

            $user->roles()->attach($request['role_id']);

            DB::commit();
            return redirect()->route('users.index');

        } catch (\Exception $e) {
            DB::rollBack();

            $message = 'Message: ' . $e->getMessage() . '. Line: ' . $e->getLine();
            Log::error($message);
        }
    }

    public function edit($id)
    {
        $user = $this->user->findOrFail($id);
        $roles = $this->role->all();
        $user_roles = $user->roles()->get();

        return view('admin.user.edit', [
            'user' => $user,
            'user_roles' => $user_roles,
            'roles' => $roles
        ]);
    }
}

