<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Participant; // Asigurați-vă că ați importat modelul Participant
use App\Http\Requests;

class ParticipantController extends Controller
{
    public function index(Request $request)
    {
        // Aici puteți implementa funcția index pentru Participant
        // Folosiți modelul Participant pentru a obține lista de participanți
        $participants = Participant::orderBy('Nume', 'ASC')->paginate(5);
        $value = ($request->input('page', 1) - 1) * 5;
        return view('participants.list', compact('participants'))->with('i', $value);
    }

    public function create()
    {
        return view('participants.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'Nume' => 'required',
            'Prenume' => 'required',
            'Email' => 'required|email',
            'Telefon' => 'required',
        ]);

        Participant::create($request->all());
        return redirect()->route('participants.index')->with('success', 'Participant added successfully!');
    }

    public function show($id)
    {
        $participant = Participant::find($id);
        return view('participants.show', compact('participant'));
    }

    public function edit($id)
    {
        $participant = Participant::find($id);
        return view('participants.edit', compact('participant'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'Nume' => 'required',
            'Prenume' => 'required',
            'Email' => 'required|email',
            'Telefon' => 'required',
        ]);

        Participant::find($id)->update($request->all());
        return redirect()->route('participants.index')->with('success', 'Participant updated successfully');
    }

    public function destroy($id)
    {
        Participant::find($id)->delete();
        return redirect()->route('participants.index')->with('success', 'Participant removed successfully');
    }
}
