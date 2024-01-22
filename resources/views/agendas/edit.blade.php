@extends('layouts.app')
@section('content')
<div class="panel panel-default">
    <div class="panel-heading">Modificare Informații Eveniment</div>
    <div class="panel-body">
        @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Eroare:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        {!! Form::model($agenda, ['method' => 'PATCH', 'route' => ['agendas.update', $agenda->id]]) !!}
        <div class="form-group">
            <label for="ID_Event">Nume Eveniment</label>
            <select name="ID_Event" class="form-control">
                @foreach ($events as $event)
                <option value="{{ $event->id }}">{{ $event->Nume_Eveniment }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="Nume_Sesiune">Nume Sesiune</label>
            <input type="text" name="Nume_Sesiune" class="form-control" value="{{ $agenda->Nume_Sesiune }}">
        </div>

        <div class="form-group">
            <label for="Ora_Start">Ora Început</label>
            <input type="time" name="Ora_Start" class="form-control" value="{{ $agenda->Ora_Start }}">
        </div>

        <div class="form-group">
            <label for="Ora_Finish">Ora Sfârșit</label>
            <input type="time" name="Ora_Finish" class="form-control" value="{{ $agenda->Ora_Finish }}">
        </div>

        <div class="form-group">
            <label for="Descriere">Descriere</label>
            <textarea name="Descriere" class="form-control" rows="3">{{ $agenda->Descriere }}</textarea>
        </div>

        <div class="form-group">
            <input type="submit" value="Salvare Modificări" class="btn btn-info">
            <a href="{{ route('agendas.index') }}" class="btn btn-default">Anulează</a>
        </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection