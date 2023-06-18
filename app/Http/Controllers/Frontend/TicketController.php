<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use App\Models\Transaction;

class TicketController extends Controller
{
    public function index()
    {
        $data = Transaction::where('user_id', auth('users')->user()->id)->with('teamMatch')->latest()->get();
        if (request()->ajax()) {
            return DataTables::of($data)
                ->addColumn('action', function ($data) {
                    $actionEdit = route('user.ticket.show', $data->id);
                    $actionDelete = route('user.ticket.destroy', $data->id);
                    return
                        view('components.action.show', ['action' => $actionEdit, 'id' => $data->id, 'status' => $data->status, 'url_payment' => $data->payment_url]) .
                        view('components.action.delete', ['action' => $actionDelete, 'id' => $data->id]);
                })
                ->addColumn('date', function ($data) {
                    return $data->created_at->format('d M Y');
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('frontend.ticket.index');
    }
}
