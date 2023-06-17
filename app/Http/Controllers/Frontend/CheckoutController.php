<?php

namespace App\Http\Controllers\Frontend;

use Exception;
use Midtrans\Snap;
use App\Models\Cart;
use Midtrans\Config;
use App\Models\TeamMatch;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\TransactionItem;
use App\Models\TransactionDetail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Frontend\CheckoutRequest;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function index(Request $request)
    {
        $match = TeamMatch::findOrFail($request->team_match_id);
        $tickets = Cart::where('user_id', Auth::guard('users')->user()->id)->where('team_match_id', $match->id)->get();
        $user = Auth::guard('users')->user();
        return view('frontend.match.checkout', compact('match', 'user', 'tickets'));
    }

    public function store(CheckoutRequest $request)
    {
        $data = $request->all();

        $match = TeamMatch::findOrFail($request->team_match_id);
        $tickets = Cart::where('user_id', Auth::guard('users')->user()->id)->where('team_match_id', $match->id)->get();
        $quantity = Cart::where('user_id', Auth::guard('users')->user()->id)->where('team_match_id', $match->id)->sum('quantity');
        $total_price = 0;
        foreach (Cart::where('user_id', Auth::guard('users')->user()->id)->whereHas('ticket', function ($query) use ($match) {
            $query->where('team_match_id', $match->id);
        })->get() as $cart) {
            $total_price += $cart->ticket->price * $cart->quantity;
        }

        $data['total_price'] = $total_price;
        $data['status'] = 'PENDING';
        $data['user_id'] = Auth::guard('users')->user()->id;
        $data['team_match_id'] = $match->id;
        $data['name'] = $request->name;
        $data['phone'] = $request->phone;

        $transaction = Transaction::create($data);
        foreach ($tickets as $ticket) {
            TransactionItem::create([
                'transaction_id' => $transaction->id,
                'ticket_id' => $ticket->ticket->id,
                'team_match_id' => $ticket->team_match_id,
                'quantity' => 1,
                'price' => $total_price
            ]);
        }

        foreach ($tickets as $key => $ticket) {
            TransactionDetail::create([
                'transaction_id' => $transaction->id,
                'ticket_id' => $ticket->ticket->id,
                'name' => $request->names[$key],
                'phone' => $request->phones[$key],
            ]);
        }

        // delete cart
        Cart::where('user_id', Auth::guard('users')->user()->id)->where('team_match_id', $match->id)->delete();

        // Set your Merchant Server Key
        Config::$serverKey = config('services.midtrans.serverKey');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        Config::$isProduction = config('services.midtrans.isProduction');
        // Set sanitization on (default)
        Config::$isSanitized = config('services.midtrans.isSanitized');
        // Set 3DS transaction for credit card to true
        Config::$is3ds = config('services.midtrans.is3ds');

        // Buat array untuk dikirim ke midtrans
        $midtrans_params = [
            'transaction_details' => [
                'order_id' => 'TIX-' . $transaction->id,
                'gross_amount' => (int) $transaction->total_price,
            ],
            'customer_details' => [
                'first_name' => $transaction->user->name,
                'email' => $transaction->user->email,
            ],
            'enabled_payments' => [
                'gopay', 'bank_transfer'
            ],
            'vtweb' => []
        ];

        // payment process
        try {
            // Get Snap Payment Page URL
            $paymentUrl = Snap::createTransaction($midtrans_params)->redirect_url;
            $transaction->payment_url = $paymentUrl;
            $transaction->save();

            // Redirect to Snap Payment Page
            return redirect($paymentUrl);
        } catch (Exception $e) {
            echo $e->getMessage();
        }

        return redirect()->route('match.index', $match->id)->with('status', 'Tiket berhasil dipesan!');
    }
}
