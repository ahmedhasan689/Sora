<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class RolesController extends Controller
{

    public function index()
    {
        return view('admin.roles.index', [
            'roles' => Role::withCount('users')->paginate()
        ]);
    }


    public function create()
    {
        return view('admin.roles.create', [
            'roles' => new Role,
        ]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'abilities' => 'required|array',
        ]);

        $role = Role::create($request->all());

        return redirect()->route('role.index')->with('success', 'Role : ' . $role->name . ' Created');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $role = Role::findOrFail($id);
        return view('admin.roles.edit', compact('role'));
    }


    public function update(Request $request,$id)
    {
        $role = Role::findOrFail($id);
        $request->validate([
            'name' => 'required',
            'abilities' => 'required|array',
        ]);

        $role->update($request->all());

        return redirect()->route('role.index')->with('success', 'Role : ' . $role->name . ' Updated');
    }


    public function destroy($id)
    {
        $roles = Role::find($id);
        $roles->delete();
        return redirect()->route('role.index')->with('success', 'Role : ' . $roles->name . ' Deleted');
    }
}
