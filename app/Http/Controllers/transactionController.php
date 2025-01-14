<?php

namespace App\Http\Controllers;

use App\Models\PaymentMethod;
use App\Models\Ticket;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class transactionController extends Controller
{
    public function showUserTransaction()
    {
        $transactions = Transaction::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->get();
        return view('transaction.userTransaction', compact('transactions'));
    }

    public function adminTransactionIndex(Request $request)
    {
        $transactionsPending = Transaction::where('status', 'pending')->orderBy('created_at', 'desc')->get();
        $transactionsSuccess = Transaction::where('status', 'success')->orderBy('created_at', 'desc')->get();
        return view('admin.transaksi.index', compact('transactionsPending', 'transactionsSuccess'));
    }

    public function createTransaction(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'payment_method_id' => 'required|numeric',
        ]);

        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->back()->with('error', 'Cart is empty.');
        }

        $validateCart = Validator::make(['cart' => $cart], [
            'cart' => 'required|array',
            'cart.*.ticket_id' => 'required|numeric',
            'cart.*.quantity' => 'required|numeric',
            'cart.*.price' => 'required|numeric',
        ]);

        if ($validateCart->fails()) {
            return redirect()->back()->with('error', 'Invalid cart data.');
        }

        $totalPrice = 0;
        $totalQuantity = 0;

        foreach ($cart as $item) {
            $ticket = Ticket::findOrFail($item['ticket_id']);
            $totalPrice = $ticket->price * $item['quantity'];
            $totalQuantity += $item['quantity'];
        }

        $transaction = Transaction::create([
            'user_id' => auth()->user()->id,
            'payment_method_id' => $request->payment_method_id,
            'total_price' => $totalPrice,
            'total_quantity' => $totalQuantity,
            'status' => 'pending',
        ]);

        $transactionId = $transaction->id;
        
        $uniqueNumber = str_pad($transaction->id, 5, '0', STR_PAD_LEFT);
        $transactionCode = 'INV-' . Carbon::now()->format('YmdHis') . $uniqueNumber;

        $transaction->update([
            'transaction_code' => $transactionCode
        ]);

        foreach ($cart as $item) {
            TransactionDetail::create([
                'transaction_id' => $transaction->id,
                'ticket_id' => $item['ticket_id'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);

            $ticket = Ticket::find($item['ticket_id']);
            $ticket->update([
                'quantity' => $ticket->quantity - $item['quantity']
            ]);
            $ticket->save();
        }

        $method = PaymentMethod::find($request->payment_method_id);

        session()->forget('cart');
        
        return redirect()->route('paymentMethod', [
            'transactionId' => $transactionId,
            'paymentMethodId' => $method->id,
        ]);
    }
}
