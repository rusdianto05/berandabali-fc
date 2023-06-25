<?php

namespace App\Http\Controllers\Admin;

use App\Models\Ticket;
use App\Models\TeamMatch;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TicketRequest;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Ticket::with('teamMatch')->where('team_match_id', request()->team_match_id)->latest()->get();
        if (request()->ajax()) {
            return DataTables::of($data)
                ->addColumn('action', function ($data) {
                    $actionEdit = route('ticket.edit', $data->id);
                    $actionDelete = route('ticket.destroy', $data->id);
                    return
                        view('components.action.edit', ['action' => $actionEdit]) .
                        view('components.action.delete', ['action' => $actionDelete, 'id' => $data->id]);
                })
                ->addColumn('image', function ($data) {
                    return '<img src="' . asset($data->image) . '" width="100px">';
                })
                ->addColumn('team_match', function ($data) {
                    return $data->teamMatch->opponent_name;
                })
                ->rawColumns(['action', 'image'])
                ->make(true);
        }
        return view('admins.ticket.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $matches = TeamMatch::where('status', 'UPCOMING')->latest()->get();
        return view('admins.ticket.create-edit', compact('matches'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TicketRequest $request)
    {
        $data = $request->validated();
        $data['image'] = 'storage/' . $request->file('image')->store('images/tickets', 'public');
        $ticket = Ticket::create($data);
        return redirect()->route('ticket.index', ['team_match_id' => $ticket->team_match_id])->with('success', 'Ticket Berhasil Ditambahkan');
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
    public function edit(Ticket $ticket)
    {
        $matches = TeamMatch::where('status', 'UPCOMING')->latest()->get();
        return view('admins.ticket.create-edit', compact('ticket', 'matches'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TicketRequest $request, Ticket $ticket)
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            file_exists($ticket->image) ? unlink($ticket->image) : null;
            $data['image'] = 'storage/' . $request->file('image')->store('images/tickets', 'public');
        }
        $ticket->update($data);
        return redirect()->route('ticket.index', ['team_match_id' => $ticket->team_match_id])->with('success', 'Ticket Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket)
    {
        file_exists($ticket->image) ? unlink($ticket->image) : null;
        $ticket->delete();
        return redirect()->route('ticket.index', ['team_match_id' => $ticket->team_match_id])->with('success', 'Ticket Berhasil Dihapus');
    }
}
