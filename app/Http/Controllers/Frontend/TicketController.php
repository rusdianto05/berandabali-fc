<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\ProfileEditRequest;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\TransactionItem;
use App\Models\User;

class TicketController extends Controller
{
    public function index()
    {
        $data = Transaction::where('user_id', auth('users')->user()->id)->with('teamMatch', 'transactionDetails', 'transactionItems.ticket')->latest()->get();

        if (request()->ajax()) {
            return DataTables::of($data)
                ->addColumn('action', function ($data) {
                    $actionEdit = route('user.ticket.show', $data->id);
                    return view('components.action.show', ['action' => $actionEdit, 'id' => $data->id, 'status' => $data->status, 'url_payment' => $data->payment_url]);
                })
                ->addColumn('date', function ($data) {
                    return $data->created_at->format('d M Y');
                })
                ->addColumn('status', function ($data) {
                    if ($data->is_exchange == true) {
                        return '<span class="badge bg-success">Sudah Ditukar</span>';
                    } elseif ($data->status == 'PENDING') {
                        return '<span class="badge bg-warning">Belum Lunas</span>';
                    } elseif ($data->status == 'SUCCESS') {
                        return '<span class="badge bg-success">Lunas</span>';
                    } elseif ($data->status == 'FAILED') {
                        return '<span class="badge bg-danger">Gagal</span>';
                    } elseif ($data->status == 'EXPIRED') {
                        return '<span class="badge bg-danger">Kedaluwarsa</span>';
                    } elseif ($data->status == 'CANCEL') {
                        return '<span class="badge bg-danger">Dibatalkan</span>';
                    } else {
                        return '<span class="badge bg-danger">' . $data->status . '</span>';
                    }
                })
                ->rawColumns(['action', 'status'])
                ->make(true);
        }
        return view('frontend.ticket.index');
    }
    public function userShow()
    {
        return view('frontend.ticket.profile');
    }
    public function edit()
    {
        return view('frontend.ticket.edit-profile');
    }

    public function update(ProfileEditRequest $request, $id)
    {
        $data = $request->except('password');
        $user = User::findOrFail($id);
        if ($request->password != null) {
            $data['password'] = bcrypt($request->password);
        }
        if ($request->hasFile('avatar')) {
            file_exists($user->avatar) ? unlink($user->avatar) : null;
            $data['avatar'] = 'storage/' . $request->file('avatar')->store('images/avatars', 'public');
        }
        $user->update($data);
        return redirect()->route('profile.show')->with('success', 'Profile berhasil diubah');
    }

    public function show($id)
    {
        $data = Transaction::with('teamMatch', 'transactionDetails', 'transactionItems.ticket')->where('id', $id)->get();
        if (request()->ajax()) {
            return DataTables::of($data)
                ->addColumn('ticket', function ($data) {
                    return $data->transactionItems->map(function ($item) {
                        return $item->ticket->name;
                    })->implode(', ');
                })
                ->addColumn('price', function ($data) {
                    return 'Rp. ' . number_format($data->transactionItems->map(function ($item) {
                        return $item->ticket->price;
                    })->implode(', '), 0, ',', '.');
                })
                ->addColumn('match', function ($data) {
                    return $data->teamMatch->opponent_name ?? '-';
                })
                ->addColumn('identity', function ($data) {
                    return $data->transactionDetails->map(function ($item) {
                        return $item->name;
                    })->implode(', ');
                })
                ->addColumn('phone', function ($data) {
                    return $data->transactionDetails->map(function ($item) {
                        return $item->phone;
                    })->implode(', ');
                })
                ->addColumn('status', function ($data) {
                    if ($data->is_exchange == true) {
                        return '<span class="badge bg-success">Sudah Ditukar</span>';
                    } elseif ($data->status == 'PENDING') {
                        return '<span class="badge bg-warning">Belum Lunas</span>';
                    } elseif ($data->status == 'SUCCESS') {
                        return '<span class="badge bg-success">Lunas</span>';
                    } elseif ($data->status == 'FAILED') {
                        return '<span class="badge bg-danger">Gagal</span>';
                    } elseif ($data->status == 'EXPIRED') {
                        return '<span class="badge bg-danger">Kedaluwarsa</span>';
                    } elseif ($data->status == 'CANCEL') {
                        return '<span class="badge bg-danger">Dibatalkan</span>';
                    } else {
                        return '<span class="badge bg-danger">' . $data->status . '</span>';
                    }
                })
                ->rawColumns(['status'])
                ->make(true);
        }
        $transaction_item = TransactionItem::where('transaction_id', $id)->first();
        return view('frontend.ticket.show', compact('data', 'transaction_item'));
    }
}
