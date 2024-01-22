<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agenda;
use App\Models\Event;
use App\Http\Requests;

class AgendaController extends Controller
{
    public function index(Request $request)
    {
        // Ajustează interogarea pentru a se potrivi nevoilor tale, de exemplu, poți dori să ordonezi agenda după data de începere
        $agenda = Agenda::orderBy('Ora_Start', 'ASC')->paginate(5);
        $value = ($request->input('page', 1) - 1) * 5;
        return view('agendas.list', compact('agenda'))->with('i', $value);
    }

    public function create()
    {
        $events = Event::all();
        return view('agendas.create', compact('events'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'ID_Event' => 'required',
            'Nume_Sesiune' => 'required',
            'Ora_Start' => 'required',
            'Ora_Finish' => 'required',
            'Descriere' => 'required',
            // Adaugă restul câmpurilor necesare pentru validare aici
        ]);

        // creează o nouă intrare în agenda
        Agenda::create($request->all());
        return redirect()->route('agendas.index')->with('success', 'Session added successfully!');
    }

    public function show($id)
    {
        $agenda = Agenda::find($id);
        return view('agendas.show', compact('agenda'));
    }

    public function edit($id)
    {
        $agenda = Agenda::find($id);
        $events = Event::all();
        return view('agendas.edit', compact('agenda', 'events'));
        $this->authorize('admin');
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'ID_Event' => 'required',
            'Nume_Sesiune' => 'required',
            'Ora_Start' => 'required',
            'Ora_Finish' => 'required',
            'Descriere' => 'required',
        
        ]);

        Agenda::find($id)->update($request->all());
        return redirect()->route('agendas.index')->with('success', 'Session updated successfully');
        $this->authorize('admin');
    }

    public function destroy($id)
    {
        Agenda::find($id)->delete();
        return redirect()->route('agendas.index')->with('success', 'Session removed successfully');
         $this->authorize('admin');
    }
}
