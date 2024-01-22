@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Adaugă Participant Nou</div>
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

            {!! Form::open(['route' => 'participants.store', 'method' => 'POST']) !!}
                <div class="form-group">
                    <label for="Nume">Nume</label>
                    <input type="text" name="Nume" class="form-control" value="{{ old('Nume') }}">
                </div>

                <div class="form-group">
                    <label for="Prenume">Prenume</label>
                    <input type="text" name="Prenume" class="form-control" value="{{ old('Prenume') }}">
                </div>

                <div class="form-group">
                    <label for="Email">Email</label>
                    <input type="email" name="Email" class="form-control" value="{{ old('Email') }}">
                </div>

                <div class="form-group">
                    <label for="Telefon">Telefon</label>
                    <input type="text" name="Telefon" class="form-control" value="{{ old('Telefon') }}">
                </div>

                <div class="form-group">
                    <input type="submit" value="Adaugă Participant" class="btn btn-info">
                    <a href="{{ route('participants.index') }}" class="btn btn-default">Anulează</a>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
