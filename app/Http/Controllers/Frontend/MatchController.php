<?php

namespace App\Http\Controllers\Frontend;

use App\Models\TeamMatch;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;

class MatchController extends Controller
{
    public function index()
    {
        $latest_match = TeamMatch::where('status', 'FINISHED')->orderBy('match_date', 'DESC')->first();
        $next_match = TeamMatch::where('status', 'UPCOMING')->orderBy('match_date', 'ASC')->get();
        return view('frontend.match.index', compact('latest_match', 'next_match'));
    }

    public function show($id)
    {
        $match = TeamMatch::findOrFail($id);
        $total_quantity = Cart::where('user_id', Auth::guard('users')->user()->id)->whereHas('ticket', function ($query) use ($match) {
            $query->where('team_match_id', $match->id);
        })->sum('quantity');
        $total_price = 0;
        foreach (Cart::where('user_id', Auth::guard('users')->user()->id)->whereHas('ticket', function ($query) use ($match) {
            $query->where('team_match_id', $match->id);
        })->get() as $cart) {
            $total_price += $cart->ticket->price * $cart->quantity;
        }
        return view('frontend.match.show', compact('match', 'total_quantity', 'total_price'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'ticket_id' => 'required'
        ]);

        $ticket = Ticket::findOrFail($request->ticket_id);
        $ticket->update([
            'quantity' => $ticket->quantity - 1
        ]);
        $cart = Cart::create([
            'user_id' => Auth::guard('users')->user()->id,
            'ticket_id' => $ticket->id,
            'team_match_id' => $ticket->teamMatch->id,
        ]);
        return redirect()->route('match.show', $ticket->teamMatch->id)->with('success', 'Berhasil menambahkan tiket ke keranjang');
    }

    public function destroy($id)
    {
        $ticket = Ticket::findOrFail($id);
        $ticket->update([
            'quantity' => $ticket->quantity + 1
        ]);
        $cart = Cart::where('user_id', Auth::guard('users')->user()->id)->where('ticket_id', $ticket->id)->first();
        $cart->delete();
        return redirect()->route('match.show', $ticket->teamMatch->id)->with('success', 'Berhasil menghapus tiket dari keranjang');
    }
}
