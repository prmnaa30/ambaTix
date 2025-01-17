<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventCategory;
use App\Models\Ticket;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;

class ticketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, $eventId)
    {
        $event = Event::findOrFail($eventId);
        $tickets = $event->tickets;
        return view('admin.tickets.index', compact('event', 'tickets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request, $eventId)
    {
        $event = Event::find($eventId);
        return view('admin.tickets.create', compact('event'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $eventId)
    {
        $request->validate([
            'ticket_type' => 'required|string|max:255',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
        ]);

        $event = Event::find($eventId);

        $ticket = new Ticket([
            "event_id"  => $event->id,
            "ticket_type" => $request->ticket_type,
            "price" => $request->price,
            "quantity" => $request->quantity,
        ]);
        
        $ticket->save();

        return redirect()->route('events.tickets.index', $event->id)
                         ->with('success', 'Tiket berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     */
    
    public function show()
    {
        $categories = EventCategory::all();
        $events = Event::all();
        
        $userId = auth()->user()->id;
    
        $transactions = Transaction::where('user_id', $userId)->where('status', 'success')->get();

        $tickets = [];
        foreach ($transactions as $transaction) {
            $transactionDetails = $transaction->transactionDetails;
            foreach ($transactionDetails as $transactionDetail) {
                $ticket = $transactionDetail->ticket;
                $event = $ticket->event;
                for ($i = 0; $i < $transactionDetail->quantity; $i++) {
                    $tickets[] = [
                        'event_name' => $event->name,
                        'event_image_url' => $event->image_url,
                        'ticket_type' => $ticket->ticket_type,
                        'price' => $ticket->price,
                    ];
                }
            }
        }

        return view('user.tickets', compact('tickets', 'categories', 'events'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $eventId, $ticketId)
    {
        $event = Event::findOrFail($eventId);
        $ticket = Ticket::findOrFail($ticketId);
        return view('admin.tickets.edit', compact('event', 'ticket'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $eventId, $ticketId)
    {
        $request->validate([
            'ticket_type' => 'required|string|max:255',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
        ]);

        $event = Event::findOrFail($eventId);
        $ticket = Ticket::findOrFail($ticketId);

        $ticket->update([
            "ticket_type" => $request->ticket_type,
            "price" => $request->price,
            "quantity" => $request->quantity,
        ]);
        
        $ticket->save();

        return redirect()->route('events.tickets.index', $event->id)
                         ->with('success', 'Tiket berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($eventId, $ticketId)
    {
        $event = Event::findOrFail($eventId);
        $ticket = Ticket::findOrFail($ticketId);
        $ticket->delete();

        return redirect()->route('events.tickets.index', $event->id)
                         ->with('success', 'Tiket berhasil dihapus.');
    }
}
