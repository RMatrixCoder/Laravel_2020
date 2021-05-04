<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{

    public function index(){
        $roles = Role::all();
        return view('roles.roles',compact('roles'));
    }
    public function store(Request $request){

        $this->validateForm($request);

        Role::create([
            'name' => $request->name,
            'persian_name' => $request->persian_name,
        ]);

        return redirect()->back();


    }

    protected function validateForm($request){

        return $request->validate([
            'name' => ['required'],
            'persian_name' => ['required'],
        ]);


    }

    public function edit(Role $role){

        $permissions = Permission::all();
        $role->load('permissions');

        return view('roles.edit',compact('permissions','role'));
    }

    public function update(Request $request, Role $role){

        $role->refreshPermissions($request->permissions);

        return redirect()->route('dashboard.roles');
    }
}
