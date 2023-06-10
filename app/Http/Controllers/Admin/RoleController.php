<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Role::with('permissions')->get();
        if (request()->ajax()) {
            return DataTables::of($data)
                ->addColumn('action', function ($data) {
                    $actionEdit = route('role.edit', $data->id);
                    $actionDelete = route('role.destroy', $data->id);
                    return
                        view('components.action.edit', ['action' => $actionEdit]) .
                        view('components.action.delete', ['action' => $actionDelete, 'id' => $data->id]);
                })
                ->editColumn('permissions', function ($query) {
                    $permission = "";
                    foreach ($query->permissions as $value) {
                        $permission .= "<span class='badge bg-info m-1'>{$value->name}</span>";
                    }
                    return $permission;
                })
                ->rawColumns(['action', 'permissions'])
                ->make(true);
        }
        return view('admins.role.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::get();
        $permissionValue = [];
        return view('admins.role.create-edit', compact('permissions', 'permissionValue'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'permissions' => 'required|array'
        ]);
        DB::beginTransaction();
        try {
            $role = Role::create($request->only('name'));

            if ($request->permissions) {
                $role->givePermissionTo($request->permissions);
            }
            DB::commit();
            return redirect()->route('role.index')->with('success', 'Data berhasil ditambahkan');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::debug($e);
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $permissions = Permission::get();
        $role = Role::with('permissions')->find($id);
        $permissionValue = $role->permissions->pluck('id')->toArray();
        return view('admins.role.create-edit', compact('role', 'permissions', 'permissionValue'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required',
            'permissions' => 'required|array'
        ]);
        DB::beginTransaction();
        try {
            $role->update($request->only('name'));
            $role->syncPermissions($request->permissions);
            DB::commit();
            return redirect()->route('role.index')->with('success', 'Data berhasil diubah');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('role.index')->with('success', 'Data berhasil dihapus');
    }
}
