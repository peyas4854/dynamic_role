<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Role::with('user')->select('id', 'title', 'created_by')->get();

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
        $this->validate($request, [
            'title' => 'required',
        ]);
        $permissions = $request->input('permissions');
        $serializePermission = serialize($permissions);

        Role::create([
            'title' => $request->title,
            'permissions' => $serializePermission,
            'created_by' => auth()->user()->id,
        ]);
        return response()->json(['msg' => 'Role added successfully.']);
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
        $data = Role::find($id);
        $permissions = unserialize($data->permissions);
        $data->permissions = $permissions;
        return $data;

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
        $this->validate($request, [
            'title' => 'required',
        ]);
        $permissions = $request->input('permissions');
        $serializePermission = serialize($permissions);

        Role::where('id', $id)
            ->update([
                'title' => $request->title,
                'permissions' => $serializePermission,
                'created_by' => auth()->user()->id,
            ]);
        return response()->json(['msg' => 'Role Updated successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Role::find($id)->delete();
        return response()->json(['msg' => 'Role Deleted successfully.']);
    }
}
