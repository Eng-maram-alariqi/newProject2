<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Datatables\RoleDataTable;


class RoleController extends Controller
{

//     function __construct()
// {
// $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index','store']]);
// $this->middleware('permission:role-create', ['only' => ['create','store']]);
// $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
// $this->middleware('permission:role-delete', ['only' => ['destroy']]);
// }

    public function index(RoleDataTable $roleDataTable)
    {
        //
        return $roleDataTable->render('roles.role.index');

    }

    public function create(): View
    {
        $tables = getTablesName();
        return view('roles.role.create', compact('tables'));
    }


    public function store(Request $request)
    {

        $permissions = array_keys($request->permissions);
        DB::transaction(function () use ($request , $permissions)
        {
            $role = Role::create(
                [
                    'name' => $request->name,
                    'guard_name' => 'web'
                ]
            );

            $role->syncPermissions($permissions);
        });

        toast('Role Created Successfully !' ,'success');
        return redirect(route('roles.index'));


        // $this->validate($request, [
        //     'name' => 'required|unique:roles,name',
        //     'permission' => 'required',
        //     ]);

        //     $role = Role::create(['name' => $request->input('name')]);
        //     $role->syncPermissions($request->input('permission'));
        //     return redirect()->route('roles.index')
        //     ->with('success','Role created successfully');
        //
    }


    public function edit(Role  $role)
    {
        $tables = getTablesName();
//        dd($role);
        return view('roles.role.edit', compact('role', 'tables'));
    }

    public function update(Request $request, Role $role)
    {
        $permissions = array_keys($request->permissions);

        $role->update([
            'name' => $request->name,
        ]);

        $role->syncPermissions($permissions);

        toast('Role Updated Successfully', 'success');
        return redirect(route('roles.index'));
    }

    public function delete( Role  $role)
    {
        DB::transaction(function () use ($role) {
            $role->syncPermissions();
            $role->delete();

        });

        toast('Role Deleted Successfully', 'success');
        return redirect(route('roles.index'));
    }



//    /**
//     * Display the specified resource.
//     */
//    public function show(string $id)
//    {
//        $role = Role::find($id);
//        $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
//        ->where("role_has_permissions.role_id",$id)
//        ->get();
//        return view('roles.show',compact('role','rolePermissions'));
//        //
//    }
//
//    /**
//     * Show the form for editing the specified resource.
//     */
//    public function edit(string $id)
//    {
//        $role = Role::find($id);
//        $permission = Permission::get();
//        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
//        ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
//        ->all();
//        return view('roles.edit',compact('role','permission','rolePermissions'));
//
//
//        //
//    }
//
//    /**
//     * Update the specified resource in storage.
//     */
//    public function update(Request $request, string $id)
//    {
//        //
//        $this->validate($request, [
//            'name' => 'required',
//            'permission' => 'required',
//            ]);
//            $role = Role::find($id);
//            $role->name = $request->input('name');
//            $role->save();
//            $role->syncPermissions($request->input('permission'));
//            return redirect()->route('roles.index')
//            ->with('success','Role updated successfully');
//    }
//
//    /**
//     * Remove the specified resource from storage.
//     */
//    public function destroy()
//    {
//        //
//        DB::table("roles")->where('id',$id)->delete();
//        return redirect()->route('roles.index')
//        ->with('success','Role deleted successfully');
//    }
}
