<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Event;
use App\Models\Participant; // Added Participant model
use App\Http\Requests;

class TicketController extends Controller
{
    public function index(Request $request)
    {
        // Eager loading both event and participant
        $tickets = Ticket::with(['event', 'participant'])->orderBy('Tip_Bilet', 'ASC')->paginate(5);
        $value = ($request->input('page', 1) - 1) * 5;
        return view('tickets.list', compact('tickets'));
    }

    public function create()
    {
        $events = Event::all();
        $participants = Participant::all(); // Fetching all participants
        return view('tickets.create', compact('events', 'participants')); // Passing participants to the view
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'Tip_Bilet' => 'required',
            'Pret' => 'required',
            'ID_Event' => 'required',
            'ID_Participant' => 'required',
        ]);
    
        Ticket::create($validatedData);
        return redirect()->route('tickets.index')->with('success', 'Ticket added successfully!');
    }
    
    public function show($id)
    {
        $ticket = Ticket::with(['event', 'participant'])->find($id); // Eager loading event and participant
        return view('tickets.show', compact('ticket'));
    }

    public function edit($id)
    {
        $ticket = Ticket::find($id);
        $events = Event::all();
        $participants = Participant::all(); // Fetching all participants
        return view('tickets.edit', compact('ticket', 'events', 'participants')); // Passing participants to the view
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'Tip_Bilet' => 'required',
            'Pret' => 'required',
            'ID_Event' => 'required',
            'ID_Participant' => 'required', // Adding validation for ID_Participant
        ]);

        Ticket::find($id)->update($request->all());
        return redirect()->route('tickets.index')->with('success', 'Ticket updated successfully');
    }

    public function destroy($id)
    {
        Ticket::find($id)->delete();
        return redirect()->route('tickets.index')->with('success', 'Ticket removed successfully');
    }
}
