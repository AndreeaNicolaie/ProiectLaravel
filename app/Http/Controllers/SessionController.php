<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Session;
use App\Models\Event; // Asigurați-vă că ați importat modelul Event
use App\Http\Requests;

class SessionController extends Controller
{
    public function index(Request $request)
    {
        // Obțineți lista de sesiuni, eventual ordonate după un criteriu specific
        $sessions = Session::orderBy('Nume_Sesiune', 'ASC')->paginate(5);
        $value = ($request->input('page', 1) - 1) * 5;
        return view('sessions.list', compact('sessions'))->with('i', $value);
    }

    public function create()
    {
        $events = Event::all();
        return view('sessions.create', compact('events'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'Nume_Sesiune' => 'required',
            'ID_Event' => 'required',
            // Adaugă restul câmpurilor necesare pentru validare aici
        ]);
        
        // creează o nouă sesiune
        Session::create($request->all());
        return redirect()->route('sessions.index')->with('success', 'Session added successfully!');
    }

    public function show($id)
    {
        $session = Session::with('event')->find($id);
        return view('sessions.show', compact('session'));
    }

    public function edit($id)
    {
        $session = Session::find($id);
        $events = Event::all();
        return view('sessions.edit', compact('session', 'events'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'Nume_Sesiune' => 'required',
            'ID_Event' => 'required',
            // Adaugă validare pentru alte câmpuri dacă este necesar
        ]);
        
        Session::find($id)->update($request->all());
        return redirect()->route('sessions.index')->with('success', 'Session updated successfully');
    }

    public function destroy($id)
    {
        Session::find($id)->delete();
        return redirect()->route('sessions.index')->with('success', 'Session removed successfully');
    }
}
