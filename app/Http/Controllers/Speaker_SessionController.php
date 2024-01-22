<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Speaker_Session;
use App\Models\Speaker; // Asigurați-vă că ați importat modelul Speaker
use App\Models\Session; // Asigurați-vă că ați importat modelul Session
use App\Http\Requests;

class Speaker_SessionController extends Controller
{
    public function index(Request $request)
    {
        $speakers_sessions = Speaker_Session::with('speaker', 'session')->orderBy('id', 'ASC')->paginate(5);        $value = ($request->input('page', 1) - 1) * 5;
        return view('speakers_sessions.list', compact('speakers_sessions'))->with('i', $value);
    }

    public function create()
    {
        $speakers = Speaker::all();
        $sessions = Session::all();
        return view('speakers_sessions.create', compact('speakers', 'sessions'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'ID_Speaker' => 'required',
            'ID_Sesiune' => 'required',
        ]);

        Speaker_Session::create($request->all());
        return redirect()->route('speakers_sessions.index')->with('success', 'Speaker Session added successfully!');
    }

    public function show($id)
    {
        $speaker_session = Speaker_Session::find($id);
        return view('speakers_sessions.show', compact('speaker_session'));
    }

    public function edit($id)
    {
        $speaker_session = Speaker_Session::find($id);
        $speakers = Speaker::all();
        $sessions = Session::all();
        return view('speakers_sessions.edit', compact('speaker_session', 'speakers', 'sessions'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'ID_Speaker' => 'required',
            'ID_Sesiune' => 'required',
        ]);

        Speaker_Session::find($id)->update($request->all());
        return redirect()->route('speakers_sessions.index')->with('success', 'Speaker Session updated successfully');
    }

    public function destroy($id)
    {
        Speaker_Session::find($id)->delete();
        return redirect()->route('speakers_sessions.index')->with('success', 'Speaker Session removed successfully');
    }
}
