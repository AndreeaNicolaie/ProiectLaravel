@extends('layouts.app')

@section('content')
@if (session('success'))
<div class="alert alert-success">
    <p>{{ session('success') }}</p>
</div>
@endif

<div class="panel panel-default">
    <div class="panel-heading">
        Lista biletelor
    </div>
    <div class="panel-body">
        <div class="form-group">
            <div class="pull-right">
                <a href="{{ route('tickets.create') }}" class="btn btn-default">Adăugare Bilet Nou</a>
            </div>
        </div>

        <table class="table table-bordered table-striped">
            <tr>
                <th width="20">Nr.</th>
                <th>Tip Bilet</th>
                <th>Preț</th>
                <th>Eveniment</th>
                <th>Participant</th> <!-- Colona nouă pentru numele participantului -->
                <th width="300">Acțiune</th>
            </tr>
            @forelse ($tickets as $ticket)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $ticket->Tip_Bilet }}</td>
                <td>{{ $ticket->Pret }}</td>
                <td>{{ $ticket->event->Nume_Eveniment }}</td>
                <td>{{ $ticket->participant->Nume . ' ' . $ticket->participant->Prenume }}</td>
                <td>
                    <a class="btn btn-success" href="{{ route('tickets.show', $ticket->id) }}">Vizualizare</a>
                    <a class="btn btn-primary" href="{{ route('tickets.edit', $ticket->id) }}">Modificare</a>
                    {!! Form::open(['method' => 'DELETE', 'route' => ['tickets.destroy', $ticket->id], 'style' => 'display:inline']) !!}
                    {!! Form::submit('Șterge', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6">Nu există bilete înregistrate!</td>
            </tr>
            @endforelse
        </table>

        {{ $tickets->links() }} <!-- Pagination links -->
    </div>
</div>
@endsection
