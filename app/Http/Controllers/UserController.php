<?php

namespace App\Http\Controllers;

use DB;
use Hash;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;


use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\DataTables;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $user = User::with('roles')->orderBy('id', 'desc')->get();
        $user = $user->reverse();
        return DataTables::of($user)
            ->addColumn('roles', function ($user) {
                return $user->roles->pluck('name')->implode(', ');
            })->toJson();
            
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $roles = Role::select('id', 'name')->get();
    
        return view('users.add_user',compact('roles'));
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $this->validate($request, [
            'username' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'phone_number' => 'required',
            'status' => 'required',
            'roles' => 'required'
            ]);
            $input = $request->all();
            $input['password'] = Hash::make($input['password']);
            $user = User::create($input);
            $user->assignRole($request->input('roles'));
            return redirect()->route('users.index')
            ->with('success','User created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $user = User::find($id);
        return view('users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $user = User::findOrFail($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
       return view('users.edit',compact('user','roles','userRole'));


      
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $this->validate($request, [
            'username' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
            'phone_number' => 'required',

            'status' => 'required',
            'roles' => 'required'
            ]);
            $input = $request->all();
            if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
            }else{
            $input = array_except($input,array('password'));
            }
            $user = User::find($id);
            $user->update($input);
            DB::table('model_has_roles')->where('model_id',$id)->delete();
            $user->assignRole($request->input('roles'));
            return redirect()->route('users.index')
            ->with('success','User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        User::find($id)->delete();
       return redirect()->route('users.index')
       ->with('success','User deleted successfully');
    }
}
