<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::paginate(10);
        return view('admin.roles.index',compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::all();
        return view('admin.roles.create',compact('permissions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required'
        ]);
        $rol = Role::create($request->all());
        $rol->permissions()->sync($request->permissions);
        return redirect()->route('admin.roles.index',$rol)->with('info','Rol creado con exito');
    }

    public function show(Role $role)
    {
        return view('admin.roles.show',compact('role'));
    }

    public function edit(Role $role)
    {
        return view('admin.roles.edit',compact('role'));
    }

    public function update(Request $request, Role $role)
    {
        //
    }

    public function destroy(Role $role)
    {
        //
    }
}
