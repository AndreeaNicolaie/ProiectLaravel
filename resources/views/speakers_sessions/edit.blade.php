@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">Modificare Speaker - Sesiune</div>
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

        {!! Form::model($speaker_session, ['method' => 'PATCH', 'route' => ['speakers_sessions.update', $speaker_session->id]]) !!}
            <div class="form-group">
                <label for="ID_Speaker">Speaker</label>
                <select name="ID_Speaker" class="form-control">
                    @foreach ($speakers as $speaker)
                        <option value="{{ $speaker->id }}" {{ $speaker->id == $speaker_session->ID_Speaker ? 'selected' : '' }}>
                            {{ $speaker->Nume . ' ' . $speaker->Prenume }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="ID_Sesiune">Sesiune</label>
                <select name="ID_Sesiune" class="form-control">
                    @foreach ($sessions as $session)
                        <option value="{{ $session->id }}" {{ $session->id == $speaker_session->ID_Sesiune ? 'selected' : '' }}>
                            {{ $session->Nume_Sesiune }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <input type="submit" value="Salvare Modificări" class="btn btn-info">
                <a href="{{ route('speakers_sessions.index') }}" class="btn btn-default">Anulează</a>
            </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection
