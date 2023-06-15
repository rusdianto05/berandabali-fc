<?php

namespace App\Http\Controllers\Admin;

use App\Models\Team;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StaffRequest;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Team::where('type', 'Staff')->latest()->get();
        if (request()->ajax()) {
            return DataTables::of($data)
                ->addColumn('action', function ($data) {
                    $actionEdit = route('staff.edit', $data->id);
                    $actionDelete = route('staff.destroy', $data->id);
                    return
                        view('components.action.edit', ['action' => $actionEdit]) .
                        view('components.action.delete', ['action' => $actionDelete, 'id' => $data->id]);
                })
                ->addColumn('image', function ($data) {
                    return '<img src="' . asset($data->image) . '" width="100px">';
                })
                ->rawColumns(['action', 'image'])
                ->make(true);
        }
        return view('admins.team.staff.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admins.team.staff.create-edit');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StaffRequest $request)
    {
        $data = $request->validated();
        $data['image'] = 'storage/' . $request->file('image')->store('images/teams', 'public');
        Team::create($data);
        return redirect()->route('staff.index')->with('success', 'Team created successfully');
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
        $staff = Team::findOrFail($id);
        return view('admins.team.staff.create-edit', compact('staff'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StaffRequest $request, string $id)
    {
        $data = $request->validated();
        $team = Team::findOrFail($id);
        if ($request->hasFile('image')) {
            file_exists($team->image) ? unlink($team->image) : null;
            $data['image'] = 'storage/' . $request->file('image')->store('images/teams', 'public');
        }
        Team::findOrFail($id)->update($data);
        return redirect()->route('staff.index')->with('success', 'Team updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $team = Team::findOrFail($id);
        file_exists($team->image) ? unlink($team->image) : null;
        $team->delete();
        return redirect()->route('staff.index')->with('success', 'Team deleted successfully');
    }
}
