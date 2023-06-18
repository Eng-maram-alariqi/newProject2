<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\DataTables\RoleDataTable;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;


class RoleController extends Controller
{

//     function __construct()
// {
// $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index','store']]);
// $this->middleware('permission:role-create', ['only' => ['create','store']]);
// $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
// $this->middleware('permission:role-delete', ['only' => ['destroy']]);
// }
    /**
     * Display a listing of the resource.
     */
    public function index(RoleDataTable $roleDataTable)
    {
        //
        return $roleDataTable->render('roles.role.index');

    }
      
    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
    

        $tables = getTablesName();
        dd($tables);
        return view('role.create', compact('tables'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $permissions = array_keys($request->permissions);

        $role = Role::create(
            [
                'name' => $request->name,
                'guard_name' => 'web'
            ]
        );

        $role->syncPermissions($permissions);

        toast('Role Created Successfully', 'success');
        return redirect(route('admin.role.index'));

        
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

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $role = Role::find($id);
        $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
        ->where("role_has_permissions.role_id",$id)
        ->get();
        return view('roles.show',compact('role','rolePermissions'));
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $role = Role::find($id);
        $permission = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
        ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
        ->all();
        return view('roles.edit',compact('role','permission','rolePermissions'));

        
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $this->validate($request, [
            'name' => 'required',
            'permission' => 'required',
            ]);
            $role = Role::find($id);
            $role->name = $request->input('name');
            $role->save();
            $role->syncPermissions($request->input('permission'));
            return redirect()->route('roles.index')
            ->with('success','Role updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        DB::table("roles")->where('id',$id)->delete();
        return redirect()->route('roles.index')
        ->with('success','Role deleted successfully');
    }
}
