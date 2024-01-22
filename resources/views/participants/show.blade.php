@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Detalii Participant</div>
        <div class="panel-body">
            <div class="pull-right">
                <a class="btn btn-default" href="{{ route('participants.index') }}">Înapoi</a>
            </div>
            <div class="form-group">
                <strong>Nume: </strong> {{ $participant->Nume }}
            </div>
            <div class="form-group">
                <strong>Prenume: </strong> {{ $participant->Prenume }}
            </div>
            <div class="form-group">
                <strong>Email: </strong> {{ $participant->Email }}
            </div>
            <div class="form-group">
                <strong>Telefon: </strong> {{ $participant->Telefon }}
            </div>
        </div>
    </div>
@endsection
