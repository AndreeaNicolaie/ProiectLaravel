@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">Adaugă Sesiune Nouă</div>
    <div class="panel-body">
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Erori:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        {!! Form::open(['route' => 'sessions.store', 'method' => 'POST']) !!}
        <div class="form-group">
            <label for="Nume_Sesiune">Nume Sesiune</label>
            <input type="text" name="Nume_Sesiune" class="form-control" value="{{ old('Nume_Sesiune') }}">
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
            <input type="submit" value="Adaugă Sesiune" class="btn btn-info">
            <a href="{{ route('sessions.index') }}" class="btn btn-default">Anulează</a>
        </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection
