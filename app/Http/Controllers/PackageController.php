<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;
use App\Http\Requests;

class PackageController extends Controller
{
    public function index(Request $request)
    {
        // Ajustează interogarea pentru a se potrivi nevoilor tale, de exemplu, poți dori să ordonezi pachetele după un anumit criteriu
        $packages = Package::orderBy('Nume_Pachet','ASC')->paginate(5);
        $value = ($request->input('page', 1) - 1) * 5;
        return view('packages.list', compact('packages'))->with('i', $value);
    }

    public function create()
    {
        return view('packages.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'Nume_Pachet' => 'required',
            'Descriere' => 'required',
            'Pret' => 'required|numeric',
            // Adaugă restul câmpurilor necesare pentru validare aici
        ]);
        
        // creează un nou pachet
        Package::create($request->all());
        return redirect()->route('packages.index')->with('success', 'Package added successfully!');
    }

    public function show($id)
    {
        $package = Package::find($id);
        return view('packages.show', compact('package'));
    }

    public function edit($id)
    {
        $package = Package::find($id);
        return view('packages.edit', compact('package'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'Nume_Pachet' => 'required',
            'Descriere' => 'required',
            'Pret' => 'required|numeric',
            // Adaugă validarea pentru restul câmpurilor aici
        ]);
        
        Package::find($id)->update($request->all());
        return redirect()->route('packages.index')->with('success', 'Package updated successfully');
    }

    public function destroy($id)
    {
        Package::find($id)->delete();
        return redirect()->route('packages.index')->with('success', 'Package removed successfully');
    }
}
