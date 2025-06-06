<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index()
    {
        $flights = \App\Models\Flight::with(['post', 'destinationRelation'])->get();
        $tickets = \App\Models\Ticket::with('flight')->get();
        return view('tickets.index', compact('tickets', 'flights'));
    }

    public function show($id)
    {
        $ticket = \App\Models\Ticket::with(['flight.post', 'flight.destinationRelation'])->findOrFail($id);
        return view('tickets.show', compact('ticket'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'flight_id' => 'required|exists:flights,id',
            'zone' => 'required|string|max:50',
            'seat' => 'required|string|max:50',
        ]);

        \App\Models\Ticket::create($request->only(['flight_id', 'zone', 'seat']));

        return redirect()->route('tickets.index')->with('success', 'Ticket created successfully!');
    }
    public function edit($id)
    {
        $ticket = \App\Models\Ticket::findOrFail($id);
        $flights = \App\Models\Flight::with(['post', 'destinationRelation'])->get();
        return view('tickets.edit', compact('ticket', 'flights'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'flight_id' => 'required|exists:flights,id',
            'zone' => 'required|string|max:50',
            'seat' => 'required|string|max:50',
        ]);

        $ticket = \App\Models\Ticket::findOrFail($id);
        $ticket->update($request->only(['flight_id', 'zone', 'seat']));

        return redirect()->route('tickets.index')->with('success', 'Ticket updated successfully!');
    }
}
