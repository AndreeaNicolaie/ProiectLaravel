@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        Vizualizare Speaker - Sesiune
    </div>
    <div class="panel-body">
        <div class="pull-right">
            <a class="btn btn-default" href="{{ route('speakers_sessions.index') }}">Înapoi la Speakeri - Sesiuni</a>
        </div>

        <div class="form-group">
            <strong>ID : </strong> {{ $speaker_session->id }}
        </div>

        <div class="form-group">
            <strong>Speaker: </strong> {{ optional($speaker_session->speaker)->Nume }} {{ optional($speaker_session->speaker)->Prenume }}
        </div>

        <div class="form-group">
            <strong>Sesiune: </strong> {{ optional($speaker_session->session)->Nume_Sesiune }}
        </div>

    </div>
</div>
@endsection
