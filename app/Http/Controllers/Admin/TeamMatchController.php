<?php

namespace App\Http\Controllers\Admin;

use App\Models\Ticket;
use App\Models\TeamMatch;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TeamMatchRequest;

class TeamMatchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = TeamMatch::latest()->get();
        if (request()->ajax()) {
            return DataTables::of($data)
                ->addColumn('action', function ($data) {
                    $actionEdit = route('team-match.edit', $data->id);
                    $actionDelete = route('team-match.destroy', $data->id);
                    $actionShow = route('ticket.index', ['team_match_id' => $data->id]);
                    return
                        view('components.action.edit', ['action' => $actionEdit]) .
                        view('components.action.delete', ['action' => $actionDelete, 'id' => $data->id]) .
                        view('components.action.ticket', ['action' => $actionShow, 'id' => $data->id]);
                })
                ->addColumn('image', function ($data) {
                    return '<img src="' . asset($data->image) . '" width="100px">';
                })
                ->rawColumns(['action', 'image'])
                ->make(true);
        }
        return view('admins.team-match.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admins.team-match.create-edit');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TeamMatchRequest $request)
    {
        $data = $request->all();
        $data['opponent_logo'] = 'storage/' . $request->file('opponent_logo')->store('images/team-match', 'public');
        TeamMatch::create($data);
        return redirect()->route('team-match.index')->with('success', 'Team Match created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TeamMatch $teamMatch)
    {
        return view('admins.team-match.create-edit', compact('teamMatch'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TeamMatchRequest $request, TeamMatch $teamMatch)
    {
        $data = $request->all();
        if ($request->hasFile('opponent_logo')) {
            file_exists($teamMatch->opponent_logo) ? unlink($teamMatch->opponent_logo) : '';
            $data['opponent_logo'] = 'storage/' . $request->file('opponent_logo')->store('images/team-match', 'public');
        }
        $teamMatch->update($data);
        return redirect()->route('team-match.index')->with('success', 'Team Match updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TeamMatch $teamMatch)
    {
        file_exists($teamMatch->opponent_logo) ? unlink($teamMatch->opponent_logo) : '';
        $teamMatch->delete();
        return redirect()->route('team-match.index')->with('success', 'Team Match deleted successfully');
    }
}
