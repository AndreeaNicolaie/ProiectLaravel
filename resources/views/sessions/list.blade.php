@extends('layouts.app')

@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<div class="panel panel-default">
    <div class="panel-heading">
        Lista Sesiuni
    </div>
    <div class="panel-body">
        <div class="form-group">
            <div class="pull-right">
                <a href="{{ route('sessions.create') }}" class="btn btn-default">Adaugare Sesiune Nouă</a>
            </div>
        </div>

        <table class="table table-bordered table-stripped">
            <tr>
                <th width="20">Nr.</th>
                <th>Nume Sesiune</th>
                <th>Eveniment</th> <!-- Se presupune că fiecare sesiune este asociată cu un eveniment -->
                <th width="300">Acțiune</th>
            </tr>
            @if (count($sessions) > 0)
            @foreach ($sessions as $key => $session)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $session->Nume_Sesiune }}</td>
                <td>{{ $session->event->Nume_Eveniment }}</td> <!-- Accesăm numele evenimentului folosind relația "event" -->
                <td>
                    <a class="btn btn-success" href="{{ route('sessions.show', $session->id) }}">Vizualizare</a>
                    <a class="btn btn-primary" href="{{ route('sessions.edit', $session->id) }}">Modificare</a>
                    {!! Form::open(['method' => 'DELETE', 'route' => ['sessions.destroy', $session->id], 'style' => 'display:inline']) !!}
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
