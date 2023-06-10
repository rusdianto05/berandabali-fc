<?php

namespace App\Http\Controllers\Admin;

use App\Models\Team;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TeamRequest;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Team::latest()->get();
        if (request()->ajax()) {
                return DataTables::of($data)
                ->addColumn('action', function ($data) {
                    $actionEdit = route('team.edit', $data->id);
                    $actionDelete = route('team.destroy', $data->id);
                    return
                        view('components.action.edit', ['action' => $actionEdit]) .
                        view('components.action.delete', ['action' => $actionDelete, 'id' => $data->id]) ;
                })
                ->addColumn('image', function ($data) {
                    return '<img src="' . asset($data->image) . '" width="100px">';
                })
                ->rawColumns(['action', 'image'])
                ->make(true);
        }
        return view('admins.team.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admins.team.create-edit');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TeamRequest $request)
    {
        $data = $request->validated();
        $data['image'] = 'storage/' . $request->file('image')->store('images/teams', 'public');
        Team::create($data);
        return redirect()->route('team.index')->with('success', 'Team created successfully');
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
    public function edit(Team $team)
    {
        return view('admins.team.create-edit', compact('team'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TeamRequest $request, Team $team)
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            $data['image'] = 'storage/' . $request->file('image')->store('images/teams', 'public');
        }
        $team->update($data);
        return redirect()->route('team.index')->with('success', 'Team updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Team $team)
    {
        file_exists($team->image) ? unlink($team->image) : '';
        $team->delete();
        return redirect()->route('team.index')->with('success', 'Team deleted successfully');
    }
}
