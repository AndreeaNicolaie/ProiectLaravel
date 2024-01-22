@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            Vizualizare Sesiune
        </div>
        <div class="panel-body">
            <div class="pull-right">
                <a class="btn btn-default" href="{{ route('sessions.index') }}">Înapoi la Lista Sesiuni</a>
            </div>

            <div class="form-group">
                <strong>ID Sesiune: </strong> {{ $session->id }}
            </div>

            <div class="form-group">
                <strong>Nume Sesiune: </strong> {{ $session->Nume_Sesiune }}
            </div>

            <div class="form-group">
                <strong>Eveniment: </strong> {{ $session->event->Nume_Eveniment }}
            </div>
        </div>
    </div>
@endsection
