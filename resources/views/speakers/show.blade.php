@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Detalii Speaker</div>
        <div class="panel-body">
            <div class="pull-right">
                <a class="btn btn-default" href="{{ route('speakers.index') }}">Înapoi</a>
            </div>
            <div class="form-group">
                <strong>Nume: </strong> {{ $speaker->Nume }}
            </div>
            <div class="form-group">
                <strong>Prenume: </strong> {{ $speaker->Prenume }}
            </div>
            <div class="form-group">
                <strong>Email: </strong> {{ $speaker->Email }}
            </div>
            <div class="form-group">
                <strong>Telefon: </strong> {{ $speaker->Telefon }}
            </div>
            <div class="form-group">
                <strong>Biografie: </strong> {{ $speaker->Bio }}
            </div>
        </div>
    </div>
@endsection
