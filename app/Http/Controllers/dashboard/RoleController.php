<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        return view('dashboard.role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Permission::create(['guard_name' => 'admin', 'name' => 'edit admin']);
        $permissions = Permission::all();
        return view('dashboard.role.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'role'      => 'required|max:32',
            'permission'      => 'required',
        ]);
        $role = Role::create(['guard_name' => 'admin', 'name' => $request->role, 'name_ar' => $request->role_ar]);
        $role->givePermissionTo($request->permission);
        return redirect()->route('role.index')->with('success', __('message.add_success'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::with('permissions')->findOrFail($id);
        $permissions = Permission::all();
        if(empty($role)) {
            return redirect()->back()->with('error', 'Item Not Found');
        } else {
            return view('dashboard.role.show', compact('role', 'permissions'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::with('permissions')->findOrFail($id);
        $permissions = Permission::all();
        if(empty($role)) {
            return redirect()->back()->with('error', __('message.not_found'));
        } else {
            return view('dashboard.role.edit', compact('role', 'permissions'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);
        $permissions = Permission::all();
        $request->validate([
            'role'          => 'required|max:32',
            // 'permission'    => 'required',
        ]);
        $role->name = $request->role;
        $role->save();
        $role->givePermissionTo($request->permission);
        $role->update($request->all());
            return redirect()->route('role.index')->with('success', __('message.update_success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        if(empty($role)) {
            return redirect()->back()->with('error', __('message.not_found'));
        } elseif($role->delete()) {
            return redirect()->back()->with('success', __('message.delete_success'));
        }
    }


    public function Multidestroy(Request $request) {

        try{
            $multiDeletes = $request->input('MultDelete');
            if($multiDeletes == null) {
                return redirect()->back()->with('error', __('message.select_item'));
            }
            $count = count($multiDeletes);
            Role::whereIn('id' , $multiDeletes)->delete();
            return redirect()->back()->with('success', __('message.multi_delete') . $count);
        }
        catch(ModelNotFoundException $ModelNotFoundException) {

            return redirect()->route('role.index')->with('error', __('message.not_found'));
        }
    }

}
