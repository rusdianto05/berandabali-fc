<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminRequest;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Admin::with('role')->get();
        if (request()->ajax()) {
            return DataTables::of($data)
                ->addColumn('action', function ($data) {
                    $actionEdit = route('admin.edit', $data->id);
                    $actionDelete = route('admin.destroy', $data->id);
                    return
                        view('components.action.edit', ['action' => $actionEdit]) .
                        view('components.action.delete', ['action' => $actionDelete, 'id' => $data->id]);
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admins.admin.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::get();
        return view('admins.admin.create-edit', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminRequest $request)
    {
        $data = $request->except('password');
        !empty($request->password) ? $data['password'] = bcrypt($request->password) : '';
        if (!empty($avatar = $request->avatar)) {
            $data['avatar'] = 'storage/' . $avatar->store('images/avatars', ['disk' => 'public']);
        }
        $admin = Admin::create($data);
        $admin->assignRole(Role::find($request->role_id)->name);
        return redirect()->route('admin.index')->with('success', 'Berhasil menambah admin');
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
    public function edit(Admin $admin)
    {
        $roles = Role::get();
        return view('admins.admin.create-edit', compact('admin', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminRequest $request, Admin $admin)
    {
        $data = $request->except('password', 'avatar');

        if (!empty($request->password) && !Str::contains($request->password, $admin->password)) {
            $data['password'] = bcrypt($request->password);
        }

        if ($request->hasFile('avatar')) {
            if (file_exists($admin->avatar)) {
                unlink($admin->avatar);
            }
            $data['avatar'] = 'storage/' . $request->avatar->store('images/avatars', ['disk' => 'public']);
        }

        $admin->update($data);
        $admin->syncRoles(Role::find($request->role_id)->name);
        return redirect()->route('admin.index')->with('success', 'Berhasil mengubah data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        file_exists($admin->avatar) ? unlink($admin->avatar) : '';
        $admin->delete();
        return redirect()->route('admin.index')->with('success', 'Berhasil menghapus admin');
    }
}
