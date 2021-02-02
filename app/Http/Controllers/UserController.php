<?php

namespace App\Http\Controllers;

use App\Http\Controllers\PermissionController as PermissionController;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;


class UserController extends PermissionController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if ($this->canManageUser() === 'manage' || $this->canManageUser() === 'read_only') {
            return User::with('role:id,title')->select('id', 'name', 'created_at', 'role_id', 'is_admin')->get();
        }
        return response()->json(['msg' => "Permission denied."]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        if ($this->canManageUser() === 'manage') {
            return User::find($id);
        }
        return response()->json(['msg' => "Permission denied."]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($this->canManageUser() === 'manage') {
            User::where('id', $id)
                ->update([
                    "role_id" => $request->role_id,
                    "is_admin" => $request->role_id == 0 ? 1 : 0,
                ]);
            return response()->json(['msg' => 'user Role Updated successfully.']);
        }
        return response()->json(['msg' => "Permission denied."]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
