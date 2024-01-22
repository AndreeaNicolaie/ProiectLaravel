@extends('layouts.app')
@section('content')
<div class="panel panel-default">
    <div class="panel-heading">Adaugă Pachet Nou</div>
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

        {{ Form::open(['route' => 'packages.store', 'method' => 'POST']) }}
        <div class="form-group">
            <label for="Nume_Pachet">Nume Pachet</label>
            <input type="text" name="Nume_Pachet" class="form-control" value="{{ old('Nume_Pachet') }}">
        </div>
        <div class="form-group">
            <label for="Descriere">Descriere</label>
            <textarea name="Descriere" class="form-control" rows="3">{{ old('Descriere') }}</textarea>
        </div>
        <div class="form-group">
            <label for="Pret">Pret</label>
            <input type="text" name="Pret" class="form-control" value="{{ old('Pret') }}">
        </div>
        <div class="form-group">
            <input type="submit" value="Adaugă Pachet" class="btn btn-info">
            <a href="{{ route('packages.index') }}" class="btn btn-default">Anulează</a>
        </div>
        {{ Form::close() }}
    </div>
</div>
@endsection