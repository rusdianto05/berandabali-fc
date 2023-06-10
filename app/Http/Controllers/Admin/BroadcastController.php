<?php

namespace App\Http\Controllers\Admin;

use App\Models\Broadcast;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BroadcastRequest;
use App\Services\BroadcastServices;

class BroadcastController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Broadcast::latest()->get();
        if (request()->ajax()) {
             return Datatables::of($data)
             ->addColumn('action', function ($data) {
                    $actionEdit = route('broadcast.edit', $data->id);
                    $actionDelete = route('broadcast.destroy', $data->id);
                    $actionSend = route('broadcast.send', $data->id);
                    return
                        view('components.action.edit', ['action' => $actionEdit]) .
                        view('components.action.delete', ['action' => $actionDelete, 'id' => $data->id]) .
                        view('components.action.send', ['action' => $actionSend, 'id' => $data->id]);
                })
                ->rawColumns(['action'])
                ->make(true);
        }
       return view('admins.broadcast.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admins.broadcast.create-edit');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BroadcastRequest $request)
    {
        $data = $request->validated();
        $data['topic'] = 'INFORMATION';
        $data['image'] = 'storage/' . $request->file('image')->store('images/broadcast', 'public');
        Broadcast::create($data);
        return redirect()->route('broadcast.index')->with('success', 'Broadcast berhasil dibuat.');
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
    public function edit(Broadcast $broadcast)
    {
        return view('admins.broadcast.create-edit', compact('broadcast'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BroadcastRequest $request, Broadcast $broadcast)
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            file_exists($broadcast->image) ? unlink($broadcast->image) : null;
            $data['image'] = 'storage/' . $request->file('image')->store('images/broadcast', 'public');
        }
        $broadcast->update($data);
        return redirect()->route('broadcast.index')->with('success', 'Broadcast berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Broadcast $broadcast)
    {
        file_exists($broadcast->image) ? unlink($broadcast->image) : null;
        $broadcast->delete();
        return redirect()->route('broadcast.index')->with('success', 'Broadcast berhasil dihapus.');
    }

    public function send_broadcast(Request $request){
    	$data = Broadcast::find($request->id);
	    $response = BroadcastServices::sendToTopic($data->title, $data->body, $data->topic, $data, $data->image);
    	return redirect()->route('broadcast.index')->with('success', 'Broadcast berhasil dikirim.');
    }

}
