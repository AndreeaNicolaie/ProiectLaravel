@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Detalii Eveniment</div>
        <div class="panel-body">
            <div class="pull-right">
                <a class="btn btn-default" href="{{ route('events.index') }}">Înapoi</a>
            </div>
            <div class="form-group">
                <strong>Nume Eveniment: </strong> {{ $event->Nume_Eveniment }}
            </div>
            <div class="form-group">
                <strong>Descriere: </strong> {{ $event->Descriere }}
            </div>
            <div class="form-group">
                <strong>Cale Imagine: </strong> {{ $event->Image_path }}
            </div>
            <div class="form-group">
                <strong>Data Început: </strong> {{ $event->Data_Start->format('d/m/Y H:i') }}
            </div>
            <div class="form-group">
                <strong>Data Sfârșit: </strong> {{ $event->Data_Finish->format('d/m/Y H:i') }}
            </div>
            <div class="form-group">
                <strong>Locație: </strong> {{ $event->Locatie }}
            </div>
            <div class="form-group">
                <strong>Număr Maxim Participanți: </strong> {{ $event->Numar_Participant_Maxim }}
            </div>
        </div>
    </div>
@endsection
