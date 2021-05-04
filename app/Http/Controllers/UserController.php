<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index(){
        $users = User::with(['roles'])->get();
        return view('users.users',compact('users'));
    }
    public function edit(User $user){

        $roles = Role::all();
        $permissions = Permission::all();
        $user->load(['roles','permissions']);
        return view('users.edit' , compact('roles','permissions','user'));
    }


    public function update(Request $request,User $user){


        $user->refreshPermissions($request->permissions);
        $user->refreshRoles($request->roles);

        return redirect()->route('dashboard.users');

    }
}
