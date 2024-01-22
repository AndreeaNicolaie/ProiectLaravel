@extends('layouts.app')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            Vizualizare Eveniment
        </div>
        <div class="panel-body">
            <div class="pull-right">
                <a class="btn btn-default" href="{{ route('agendas.index') }}">Înapoi</a>
            </div>

            <div class="form-group">
                <strong>Nume Eveniment: </strong> {{ $agenda->event->Nume_Eveniment }}
            </div>

            <div class="form-group">
                <strong>Nume Sesiune: </strong> {{ $agenda->Nume_Sesiune }}
            </div>

            <div class="form-group">
                <strong>Ora Început: </strong> {{ $agenda->Ora_Start }}
            </div>

            <div class="form-group">
                <strong>Ora Sfârșit: </strong> {{ $agenda->Ora_Finish }}
            </div>

            <div class="form-group">
                <strong>Descriere: </strong> {{ $agenda->Descriere }}
            </div>

        </div>
    </div>
@endsection
