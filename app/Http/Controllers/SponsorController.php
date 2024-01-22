<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sponsor;
use App\Models\Event;
use App\Http\Requests;

class SponsorController extends Controller
{
    public function index(Request $request)
    {
        // Ajustează interogarea pentru a se potrivi nevoilor tale, de exemplu, poți dori să ordonezi sponsorii după un anumit criteriu
        $sponsors = Sponsor::orderBy('Nume_Sponsor','ASC')->paginate(5);
        $value = ($request->input('page', 1) - 1) * 5;
        return view('sponsors.list', compact('sponsors'))->with('i', $value);
    }

    public function create()
{
    $events = Event::all();
    return view('sponsors.create', compact('events'));
}

    

    public function store(Request $request)
    {
        $this->validate($request, [
            'Nume_Sponsor' => 'required',
            'Descriere' => 'required',
            'Contact_Nume' => 'required',
            'Contact_Email' => 'required|email',
            'Contact_Telefon' => 'required',
            'ID_Event' => 'required',
            // Adaugă restul câmpurilor necesare pentru validare aici
        ]);
        
        // creează un nou sponsor
        Sponsor::create($request->all());
        return redirect()->route('sponsors.index')->with('success', 'Sponsor added successfully!');
    }

    public function show($id)
    {
        $sponsor = Sponsor::with('event')->find($id);
        return view('sponsors.show', compact('sponsor'));
    }

    public function edit($id)
    {
        $sponsor = Sponsor::find($id);
        $events = Event::all(); 
        return view('sponsors.edit', compact('sponsor', 'events'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'Nume_Sponsor' => 'required',
            'Descriere' => 'required',
            'Contact_Nume' => 'required',
            'Contact_Email' => 'required|email',
            'Contact_Telefon' => 'required',
            'ID_Event' => 'required',

        ]);
        
        Sponsor::find($id)->update($request->all());
        return redirect()->route('sponsors.index')->with('success', 'Sponsor updated successfully');
    }

    public function destroy($id)
    {
        Sponsor::find($id)->delete();
        return redirect()->route('sponsors.index')->with('success', 'Sponsor removed successfully');
    }
}