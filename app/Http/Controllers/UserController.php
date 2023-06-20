<?php

namespace App\Http\Controllers;

use App\DataTables\UserDataTable;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;


class UserController extends Controller
{

    public function index(UserDataTable $userDataTable)
    {
        return $userDataTable->render('user.index');
    }


    public function create()
    {
        return view('user.create', [
            'status' => User::STATUS,
            'roles' => $this->getAllRoles(),
        ]);
    }


    public function store(StoreUserRequest $request)
    {

        $admin = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone_number' => $request->phone_number,
            'status' => $request->status,
        ]);

        $admin->assignRole($request->roles);

        toast('User Created Successfully', 'success');
        return redirect(route('users.index'));
    }

    public function show(string $id)
    {
        //
        $user = User::find($id);
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('user.edit', [
            'user' => $user,
            'status' => User::STATUS,
            'roles' => $this->getAllRoles(),
        ]);


    }

    public function update(UpdateUserRequest $request, User $user)
    {
        DB::transaction(function () use ($request, $user) {
            $user->update([
                'username' => $request->username,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => $request->password ? Hash::make($request->password) : $user->password,
            ]);

            $user->syncRoles(); // Delete All Roles
            $user->syncRoles($request->roles); // Sync New Roles
        });
        toast('User Updated Successfully', 'success');
        return redirect(route('users.index'));
    }


    public function delete(User $user)
    {
        $user->delete();

        toast('User Deleted Successfully', 'success');
        return redirect(route('users.index'));
    }


    public function getAllRoles()
    {
        return Role::select('id', 'name')->get();
    }
}
