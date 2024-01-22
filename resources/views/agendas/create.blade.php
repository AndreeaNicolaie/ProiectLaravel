@extends('layouts.app')
@section('content')
<div class="panel panel-default">
    <div class="panel-heading">Adaugă Eveniment Nou</div>
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

        {{ Form::open(['route' => 'agendas.store', 'method' => 'POST']) }}
        <div class="form-group">
            <label for="ID_Event">Eveniment</label>
            <select name="ID_Event" class="form-control">
                @foreach ($events as $event)
                <option value="{{ $event->id }}">{{ $event->Nume_Eveniment }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="Nume_Sesiune">Nume Sesiune</label>
            <input type="text" name="Nume_Sesiune" class="form-control" value="{{ old('Nume_Sesiune') }}">
        </div>
        <div class="form-group">
            <label for="Ora_Start">Ora Start</label>
            <input type="time" name="Ora_Start" class="form-control" value="{{ old('Ora_Start') }}">
        </div>
        <div class="form-group">
            <label for="Ora_Finish">Ora Finish</label>
            <input type="time" name="Ora_Finish" class="form-control" value="{{ old('Ora_Finish') }}">
        </div>
        <div class="form-group">
            <label for="Descriere">Descriere</label>
            <textarea name="Descriere" class="form-control" rows="3">{{ old('Descriere') }}</textarea>
        </div>
        <div class="form-group">
            <input type="submit" value="Adauga Eveniment" class="btn btn-info">
            <a href="{{ route('agendas.index') }}" class="btn btn-default">Cancel</a>
        </div>
        {{ Form::close() }}
    </div>
</div>
@endsection
