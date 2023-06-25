<?php

namespace App\Http\Controllers\Admin;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Transaction::with(['user', 'teamMatch', 'transactionDetails', 'transactionItems'])->latest()->get();
        if (request()->ajax()) {
            return DataTables::of($data)
                ->addColumn('total_ticket', function ($data) {
                    return $data->transactionDetails->count() ?? 0;
                })
                ->addColumn('action', function ($data) {
                    $actionEdit = route('transaction.edit', $data->id);
                    $actionDelete = route('transaction.destroy', $data->id);
                    return
                        view('components.action.edit', ['action' => $actionEdit]) .
                        view('components.action.delete', ['action' => $actionDelete, 'id' => $data->id]);
                })
                ->addColumn('team_match', function ($data) {
                    return $data->teamMatch->opponent_name;
                })
                ->rawColumns(['image', 'action'])
                ->make(true);
        }
        return view('admins.transaction.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
