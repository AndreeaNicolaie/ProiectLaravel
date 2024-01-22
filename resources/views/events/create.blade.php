@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Adaugă Eveniment Nou</div>
        <div class="panel-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Erori:</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {!! Form::open(['route' => 'events.store', 'method' => 'POST']) !!}
                <div class="form-group">
                    <label for="Nume_Eveniment">Nume Eveniment</label>
                    <input type="text" name="Nume_Eveniment" class="form-control" value="{{ old('Nume_Eveniment') }}">
                </div>

                <div class="form-group">
                    <label for="Descriere">Descriere</label>
                    <textarea name="Descriere" class="form-control" rows="3">{{ old('Descriere') }}</textarea>
                </div>

                <div class="form-group">
                    <label for="Image_path">Cale Imagine</label>
                    <input type="text" name="Image_path" class="form-control" value="{{ old('Image_path') }}">
                </div>

                <div class="form-group">
                    <label for="Data_Start">Data Început</label>
                    <input type="datetime-local" name="Data_Start" class="form-control" value="{{ old('Data_Start') }}">
                </div>

                <div class="form-group">
                    <label for="Data_Finish">Data Sfârșit</label>
                    <input type="datetime-local" name="Data_Finish" class="form-control" value="{{ old('Data_Finish') }}">
                </div>

                <div class="form-group">
                    <label for="Locatie">Locație</label>
                    <input type="text" name="Locatie" class="form-control" value="{{ old('Locatie') }}">
                </div>

                <div class="form-group">
                    <label for="Numar_Participant_Maxim">Număr Maxim Participanți</label>
                    <input type="number" name="Numar_Participant_Maxim" class="form-control" value="{{ old('Numar_Participant_Maxim') }}">
                </div>

                <div class="form-group">
                    <input type="submit" value="Adaugă Eveniment" class="btn btn-info">
                    <a href="{{ route('events.index') }}" class="btn btn-default">Anulează</a>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
