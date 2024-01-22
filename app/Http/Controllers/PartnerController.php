<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partner;
use App\Models\Event;
use App\Models\Package;
use App\Http\Requests;

class PartnerController extends Controller
{
    public function index(Request $request)
    {
        // Ajustează interogarea pentru a se potrivi nevoilor tale, de exemplu, poți dori să ordonezi partenerii după un anumit criteriu
        $partners = Partner::orderBy('Nume_Partener','ASC')->paginate(5);
        $value = ($request->input('page', 1) - 1) * 5;
        return view('partners.list', compact('partners'))->with('i', $value);
    }

    public function create()
    {
        $events = Event::all();
        $packages = Package::all();
        return view('partners.create', compact('events', 'packages'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'Nume_Partener' => 'required',
            'Descriere' => 'required',
            'Contact_Nume' => 'required',
            'Contact_Email' => 'required|email',
            'Contact_Telefon' => 'required',
            'ID_Event' => 'required',
            'ID_Package' => 'required',
            // Adaugă restul câmpurilor necesare pentru validare aici
        ]);
        
        // creează un nou partener
        Partner::create($request->all());
        return redirect()->route('partners.index')->with('success', 'Partener added successfully!');
    }

    public function show($id)
    {
        $partner = Partner::find($id);
        $eventName = $partner->event->Nume_Eveniment;
        return view('partners.show', compact('partner', 'eventName'));

    }

    public function edit($id)
    {
        $partner = Partner::find($id);
        $events = Event::all();
        $packages = Package::all();

        return view('partners.edit', compact('partner', 'events', 'packages'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'Nume_Partener' => 'required',
            'Descriere' => 'required',
            'Contact_Nume' => 'required',
            'Contact_Email' => 'required|email',
            'Contact_Telefon' => 'required',
            'ID_Event' => 'required',
            'ID_Package' => 'required',
            // Adaugă validarea pentru restul câmpurilor aici
        ]);
        
        Partner::find($id)->update($request->all());
        return redirect()->route('partners.index')->with('success', 'Partener updated successfully');
    }

    public function destroy($id)
    {
        Partner::find($id)->delete();
        return redirect()->route('partners.index')->with('success', 'Partener removed successfully');
    }
}