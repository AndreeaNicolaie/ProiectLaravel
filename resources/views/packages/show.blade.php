@extends('layouts.app')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            Vizualizare Pachet
        </div>
        <div class="panel-body">
            <div class="pull-right">
                <a class="btn btn-default" href="{{ route('packages.index') }}">Înapoi</a>
            </div>

            <div class="form-group">
                <strong>ID Pachet: </strong> {{ $package->ID_Pachet }}
            </div>

            <div class="form-group">
                <strong>Nume Pachet: </strong> {{ $package->Nume_Pachet }}
            </div>

            <div class="form-group">
                <strong>Descriere: </strong> {{ $package->Descriere }}
            </div>

            <div class="form-group">
                <strong>Pret: </strong> {{ $package->Pret }}
            </div>

        </div>
    </div>
@endsection