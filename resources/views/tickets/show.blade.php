@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">Detalii Bilet</div>
    <div class="panel-body">
        <div class="pull-right">
            <a class="btn btn-default" href="{{ route('tickets.index') }}">Înapoi la Bilete</a>
        </div>
        <div class="form-group">
            <strong>Tip Bilet: </strong> {{ $ticket->Tip_Bilet }}
        </div>
        <div class="form-group">
            <strong>Preț: </strong> {{ $ticket->Pret }} 
        </div>
        <div class="form-group">
            <strong>Eveniment: </strong> {{ $ticket->event->Nume_Eveniment ?? 'N/A' }}
        </div>
        <!-- Add this section for Participant details -->
        <div class="form-group">
            <strong>Participant: </strong> {{ optional($ticket->participant)->Nume . ' ' . optional($ticket->participant)->Prenume ?? 'N/A' }}
        </div>
    </div>
</div>
@endsection
