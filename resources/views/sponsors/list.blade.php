@extends('layouts.app')
@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<div class="panel panel-default">
    <div class="panel-heading">
        Lista Sponsori
    </div>
    <div class="panel-body">
        <div class="form-group">
            <div class="pull-right">
                <a href="{{ route('sponsors.create') }}" class="btn btn-default">Adaugare Sponsor Nou</a>
            </div>
        </div>

        <table class="table table-bordered table-stripped">
            <tr>
                <th width="20">Nr.</th>
                <th>Nume Sponsor</th>
                <th>Descriere</th>
                <th>Contact Nume</th>
                <th>Contact Email</th>
                <th>Contact Telefon</th>
                <th>Eveniment</th> <!-- Schimbat din "ID Eveniment" în "Eveniment" -->
                <th width="300">Acțiune</th>
            </tr>
            @if (count($sponsors) > 0)
            @foreach ($sponsors as $key => $sponsor)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $sponsor->Nume_Sponsor }}</td>
                <td>{{ $sponsor->Descriere }}</td>
                <td>{{ $sponsor->Contact_Nume }}</td>
                <td>{{ $sponsor->Contact_Email }}</td>
                <td>{{ $sponsor->Contact_Telefon }}</td>
                <td>{{ $sponsor->event->Nume_Eveniment }}</td> <!-- Accesăm numele evenimentului folosind relația "event" -->
                <td>
                    <a class="btn btn-success" href="{{ route('sponsors.show', $sponsor->id) }}">Vizualizare</a>
                    <a class="btn btn-primary" href="{{ route('sponsors.edit', $sponsor->id) }}">Modificare</a>
                    {!! Form::open(['method' => 'DELETE', 'route' => ['sponsors.destroy', $sponsor->id], 'style' => 'display:inline']) !!}
                    {!! Form::submit('Șterge', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
            @endif
        </table>
    </div>
</div>
@endsection
