@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Modificare Informații Speaker</div>
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

            {!! Form::model($speaker, ['method' => 'PATCH', 'route' => ['speakers.update', $speaker->id]]) !!}
                <div class="form-group">
                    <label for="Nume">Nume</label>
                    <input type="text" name="Nume" class="form-control" value="{{ $speaker->Nume }}">
                </div>

                <div class="form-group">
                    <label for="Prenume">Prenume</label>
                    <input type="text" name="Prenume" class="form-control" value="{{ $speaker->Prenume }}">
                </div>

                <div class="form-group">
                    <label for="Email">Email</label>
                    <input type="email" name="Email" class="form-control" value="{{ $speaker->Email }}">
                </div>

                <div class="form-group">
                    <label for="Telefon">Telefon</label>
                    <input type="text" name="Telefon" class="form-control" value="{{ $speaker->Telefon }}">
                </div>

                <div class="form-group">
                    <label for="Bio">Biografie</label>
                    <textarea name="Bio" class="form-control">{{ $speaker->Bio }}</textarea>
                </div>

                <div class="form-group">
                    <input type="submit" value="Salvare Modificări" class="btn btn-info">
                    <a href="{{ route('speakers.index') }}" class="btn btn-default">Anulează</a>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
