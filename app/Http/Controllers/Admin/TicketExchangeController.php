<?php

namespace App\Http\Controllers\Admin;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TicketExchangeRequest;

class TicketExchangeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Transaction::where('is_exchange', true)->latest()->get();
        if (request()->ajax()) {
            return DataTables::of($data)
                ->addColumn('image', function ($data) {
                    return '<img src="' . asset($data->image) . '" width="100px">';
                })
                ->addColumn('team_match', function ($data) {
                    return $data->teamMatch->opponent_name;
                })
                ->editColumn('is_exchange', function ($data) {
                    return $data->is_exchange ? '<span class="badge badge-success">Sudah Ditukar</span>' : '<span class="badge badge-danger">Belum Ditukar</span>';
                })
                ->rawColumns(['image', 'is_exchange'])
                ->make(true);
        }
        return view('admins.ticket.exchange.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admins.ticket.exchange.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TicketExchangeRequest $request)
    {
        $data = $request->validated();
        $transaction = Transaction::whereBookingId($data['booking_id'])->first();
        if ($transaction) {
            $transaction->update(['is_exchange' => true]);
            return redirect()->route('ticket-exchange.index')->with('success', 'Tiket Berhasil Ditukar');
        }
        return redirect()->back()->with('error', 'Tiket Tidak Ditemukan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
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
