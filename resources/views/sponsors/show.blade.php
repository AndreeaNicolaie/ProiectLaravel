@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            Vizualizare Sponsor
        </div>
        <div class="panel-body">
            <div class="pull-right">
                <a class="btn btn-default" href="{{ route('sponsors.index') }}">Înapoi la Lista Sponsori</a>
            </div>

            <div class="form-group">
                <strong>ID Sponsor: </strong> {{ $sponsor->id }}
            </div>

            <div class="form-group">
                <strong>Nume Sponsor: </strong> {{ $sponsor->Nume_Sponsor }}
            </div>

            <div class="form-group">
                <strong>Descriere: </strong> {{ $sponsor->Descriere }}
            </div>

            <div class="form-group">
                <strong>Contact Nume: </strong> {{ $sponsor->Contact_Nume }}
            </div>

            <div class="form-group">
                <strong>Contact Email: </strong> {{ $sponsor->Contact_Email }}
            </div>

            <div class="form-group">
                <strong>Contact Telefon: </strong> {{ $sponsor->Contact_Telefon }}
            </div>

            <div class="form-group">
                <strong>Eveniment: </strong> {{ $sponsor->event->Nume_Eveniment }}
            </div>
        </div>
    </div>
@endsection
