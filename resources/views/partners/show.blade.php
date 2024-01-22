@extends('layouts.app')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            Vizualizare Partener
        </div>
        <div class="panel-body">
            <div class="pull-right">
                <a class="btn btn-default" href="{{ route('partners.index') }}">Înapoi</a>
            </div>

            <div class="form-group">
                <strong>ID Partener: </strong> {{ $partner->id }}
            </div>

            <div class="form-group">
                <strong>Nume Partener: </strong> {{ $partner->Nume_Partener }}
            </div>

            <div class="form-group">
                <strong>Descriere: </strong> {{ $partner->Descriere }}
            </div>

            <div class="form-group">
                <strong>Contact Nume: </strong> {{ $partner->Contact_Nume }}
            </div>

            <div class="form-group">
                <strong>Contact Email: </strong> {{ $partner->Contact_Email }}
            </div>

            <div class="form-group">
                <strong>Contact Telefon: </strong> {{ $partner->Contact_Telefon }}
            </div>

            <div class="form-group">
                <strong>Eveniment: </strong> {{ $partner->event->Nume_Eveniment }}
            </div>

            <div class="form-group">
                <strong>Pachet: </strong> {{ $partner->package->Nume_Pachet }}
            </div>

        </div>
    </div>
@endsection
