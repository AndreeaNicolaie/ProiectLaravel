@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">Adaugă Legătură Nouă între Speaker și Sesiune</div>
    <div class="panel-body">
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Errors:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        {!! Form::open(['route' => 'speakers_sessions.store', 'method' => 'POST']) !!}
        <div class="form-group">
            <label for="ID_Speaker">Speaker</label>
            <select name="ID_Speaker" class="form-control">
                @foreach ($speakers as $speaker)
                <option value="{{ $speaker->id }}">{{ $speaker->Nume . ' ' . $speaker->Prenume}}</option> 
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="ID_Sesiune">Sesiune</label>
            <select name="ID_Sesiune" class="form-control">
                @foreach ($sessions as $session)
                <option value="{{ $session->id }}">{{ $session->Nume_Sesiune }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <input type="submit" value="Adaugă Legătură" class="btn btn-info">
            <a href="{{ route('speakers_sessions.index') }}" class="btn btn-default">Anulează</a>
        </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection
