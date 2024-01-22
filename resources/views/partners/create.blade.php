@extends('layouts.app')
@section('content')
<div class="panel panel-default">
    <div class="panel-heading">Adaugă Partener Nou</div>
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

        {{ Form::open(['route' => 'partners.store', 'method' => 'POST']) }}
        <div class="form-group">
            <label for="Nume_Partener">Nume Partener</label>
            <input type="text" name="Nume_Partener" class="form-control" value="{{ old('Nume_Partener') }}">
        </div>
        <div class="form-group">
            <label for="Descriere">Descriere</label>
            <textarea name="Descriere" class="form-control" rows="3">{{ old('Descriere') }}</textarea>
        </div>
        <div class="form-group">
            <label for="Contact_Nume">Nume Contact</label>
            <input type="text" name="Contact_Nume" class="form-control" value="{{ old('Contact_Nume') }}">
        </div>
        <div class="form-group">
            <label for="Contact_Email">Email Contact</label>
            <input type="email" name="Contact_Email" class="form-control" value="{{ old('Contact_Email') }}">
        </div>
        <div class="form-group">
            <label for="Contact_Telefon">Telefon Contact</label>
            <input type="text" name="Contact_Telefon" class="form-control" value="{{ old('Contact_Telefon') }}">
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
            <label for="ID_Package">Pachet</label>
            <select name="ID_Package" class="form-control">
                @foreach ($packages as $package)
                    <option value="{{ $package->id }}">{{ $package->Nume_Pachet }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <input type="submit" value="Adaugă Partener" class="btn btn-info">
            <a href="{{ route('partners.index') }}" class="btn btn-default">Anulează</a>
        </div>
        {{ Form::close() }}
    </div>
</div>
@endsection
