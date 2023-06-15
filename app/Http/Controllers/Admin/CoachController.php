<?php

namespace App\Http\Controllers\Admin;

use App\Models\Team;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CoachRequest;

class CoachController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Team::where('type', 'Pelatih')->latest()->get();
        if (request()->ajax()) {
            return DataTables::of($data)
                ->addColumn('action', function ($data) {
                    $actionEdit = route('coach.edit', $data->id);
                    $actionDelete = route('coach.destroy', $data->id);
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
        return view('admins.team.coach.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admins.team.coach.create-edit');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CoachRequest $request)
    {
        $data = $request->validated();
        $data['image'] = 'storage/' . $request->file('image')->store('images/teams', 'public');
        Team::create($data);
        return redirect()->route('coach.index')->with('success', 'Team created successfully');
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
        $coach = Team::findOrFail($id);
        return view('admins.team.coach.create-edit', compact('coach'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CoachRequest $request, string $id)
    {
        $data = $request->validated();
        $team = Team::findOrFail($id);
        if ($request->hasFile('image')) {
            file_exists($team->image) ? unlink($team->image) : null;
            $data['image'] = 'storage/' . $request->file('image')->store('images/teams', 'public');
        }
        $team->update($data);
        return redirect()->route('coach.index')->with('success', 'Team updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $team = Team::findOrFail($id);
        file_exists($team->image) ? unlink($team->image) : null;
        $team->delete();
        return redirect()->route('coach.index')->with('success', 'Team deleted successfully');
    }
}
