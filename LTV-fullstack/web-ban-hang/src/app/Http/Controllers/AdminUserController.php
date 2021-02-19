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

            $roleIds = $request['role_id'];
            foreach ($roleIds as $roleId) {
                DB::table('role_user')->insert([
                    'role_id' => $roleId,
                    'user_id' => $user->id
                ]);
            }

            DB::commit();
            return redirect()->route('users.index');

        } catch (\Exception $e) {
            DB::rollBack();

            $message = 'Message: ' . $e->getMessage() . '. Line: ' . $e->getLine();
            Log::error($message);
        }
    }
}
