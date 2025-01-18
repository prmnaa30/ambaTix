<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventCategory;
use App\Models\PaymentMethod;
use App\Models\Ticket;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;

class paymentController extends Controller
{
    public function ticketList(string $id)
    {
        $categories = EventCategory::all();

        $event = Event::find($id);
        $tickets = Event::find($id)->tickets;

        $cart = session()->get('cart', []);

        $totalPrice = 0;
        foreach ($cart as $item) {
            $totalPrice += $item['quantity'] * $item['price'];
        }

        return view('payment.ticketList', compact('categories', 'event', 'tickets', 'cart', 'totalPrice'));
    }

    public function addTicket(Request $request)
    {
        $request->validate([
            'ticket_id' => 'required|numeric',
            'ticket_type' => 'required|string|max:255',
            'quantity' => 'required|numeric',
            'price' => 'required|numeric',
        ]);

        $ticket = Ticket::findOrFail($request->ticket_id);

        $cart = session()->get('cart', []);

        if (isset($cart[$ticket->id])) {
            $cart[$ticket->id]['quantity'] += $request->quantity;
        } else {
            $cart[$ticket->id] = [
                "ticket_id" => $ticket->id,
                "ticket_type" => $request->ticket_type,
                "quantity" => $request->quantity,
                "price" => $ticket->price
            ];
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Ticket added to cart successfully!');
    }

    public function removeTicket(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            return redirect()->back()->with('success', 'Ticket removed from cart successfully!');
        }
    }

    public function clearCart(Request $request)
    {
        session()->forget('cart');
        return redirect()->back()->with('success', 'Cart cleared successfully!');
    }

    public function paymentDetail(string $id)
    {
        $paymentMethods = PaymentMethod::all();
        $categories = EventCategory::all();

        $event = Event::find($id);

        $cart = session()->get('cart', []);
        
        $ticketCount = 0;
        foreach ($cart as $item) {
            $ticketCount += $item['quantity'];
        }

        $totalPrice = 0;
        foreach ($cart as $item) {
            $totalPrice += $item['quantity'] * $item['price'];
        }

        if (empty($cart)) {
            return redirect()->back()->with('error', 'Cart is empty.');
        }

        return view('payment.paymentDetail', compact('paymentMethods', 'categories', 'event', 'cart', 'ticketCount', 'totalPrice'));
    }

    public function paymentMethod($paymentMethodId, $transactionId)
    {
        $categories = EventCategory::all();

        $transaction = Transaction::with('payment')->find($transactionId);
        $paymentMethod = PaymentMethod::find($paymentMethodId);
        $paymentDeadline = Carbon::now()->addHour();
        
        return view('payment.paymentMethod', compact('categories', 'paymentMethod', 'transaction'));
    }

    public function updatePaymentStatus(Request $request, $transactionId)
    {
        $transaction = Transaction::find($transactionId);
        
        if ($transaction) {
            $transaction->status = $request->status;
            $transaction->save();
        }

        return redirect()->back()->with('success', 'Payment status updated successfully!');
    }
}
