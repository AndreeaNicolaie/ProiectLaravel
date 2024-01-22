<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Speaker; // Importați modelul Speaker
use App\Http\Requests;

class SpeakerController extends Controller
{
    public function index(Request $request)
    {
        // Obțineți lista de speakeri, ordonați după Nume
        $speakers = Speaker::orderBy('Nume', 'ASC')->paginate(5);
        $value = ($request->input('page', 1) - 1) * 5;
        return view('speakers.list', compact('speakers'))->with('i', $value);
    }

    public function create()
    {
        // Vizualizare pentru crearea unui nou speaker
        return view('speakers.create');
    }

    public function store(Request $request)
    {
        // Validați datele de intrare
        $this->validate($request, [
            'Nume' => 'required',
            'Prenume' => 'required',
            'Email' => 'required|email',
            'Bio' => 'required', // Adăugat câmpul Bio
        ]);

        // Crearea unui nou speaker
        Speaker::create($request->all());
        return redirect()->route('speakers.index')->with('success', 'Speaker added successfully!');
    }

    public function show($id)
    {
        // Afișarea detaliilor unui speaker
        $speaker = Speaker::find($id);
        return view('speakers.show', compact('speaker'));
    }

    public function edit($id)
    {
        // Editarea unui speaker existent
        $speaker = Speaker::find($id);
        return view('speakers.edit', compact('speaker'));
    }

    public function update(Request $request, $id)
    {
        // Actualizarea datelor speakerului
        $this->validate($request, [
            'Nume' => 'required',
            'Prenume' => 'required',
            'Email' => 'required|email',
            'Bio' => 'required', // Validare pentru Bio
        ]);

        Speaker::find($id)->update($request->all());
        return redirect()->route('speakers.index')->with('success', 'Speaker updated successfully');
    }

    public function destroy($id)
    {
        // Ștergerea unui speaker
        Speaker::find($id)->delete();
        return redirect()->route('speakers.index')->with('success', 'Speaker removed successfully');
    }
}
