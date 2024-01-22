@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">Adaugă Bilet Nou</div>
    <div class="panel-body">
        @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Errors:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        {!! Form::open(['route' => 'tickets.store', 'method' => 'POST']) !!}
        <div class="form-group">
            <label for="Tip_Bilet">Tip Bilet</label>
            <input type="text" name="Tip_Bilet" class="form-control" value="{{ old('Tip_Bilet') }}">
        </div>
        <div class="form-group">
            <label for="Pret">Preț</label>
            <input type="text" name="Pret" class="form-control" value="{{ old('Pret') }}">
        </div>
        <div class="form-group">
            <label for="ID_Event">Eveniment</label>
            <select name="ID_Event" class="form-control">
                @foreach ($events as $event)
                <option value="{{ $event->id }}">{{ $event->Nume_Eveniment }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="ID_Participant">Participant</label>
            <select name="ID_Participant" class="form-control">
                @foreach ($participants as $participant)
                <option value="{{ $participant->id }}">{{ $participant->Nume . ' ' . $participant->Prenume }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <input type="submit" value="Adaugă Bilet" class="btn btn-info">
            <a href="{{ route('tickets.index') }}" class="btn btn-default">Înapoi</a>
        </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection
