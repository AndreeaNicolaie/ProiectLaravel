@extends('layouts.app')
@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<div class="panel panel-default">
    <div class="panel-heading">
        Lista Parteneri
    </div>
    <div class="panel-body">
        <div class="form-group">
            <div class="pull-right">
                <a href="{{ route('partners.create') }}" class="btn btn-default">Adaugare Partener Nou</a>
            </div>
        </div>

        <table class="table table-bordered table-stripped">
            <tr>
                <th width="20">Nr.</th>
                <th>Nume Partener</th>
                <th>Descriere</th>
                <th>Contact Nume</th>
                <th>Contact Email</th>
                <th>Contact Telefon</th>
                <th>Nume Pachet</th>
                <th>Nume Eveniment</th>
                <th width="300">Acțiune</th>
            </tr>
            @if (count($partners) > 0)
            @foreach ($partners as $key => $partner)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $partner->Nume_Partener }}</td>
                <td>{{ $partner->Descriere }}</td>
                <td>{{ $partner->Contact_Nume }}</td>
                <td>{{ $partner->Contact_Email }}</td>
                <td>{{ $partner->Contact_Telefon }}</td>
                <td>{{ $partner->package->Nume_Pachet }}</td>
                <td>{{ $partner->event->Nume_Eveniment }}</td>
                <td>
                    <a class="btn btn-success" href="{{ route('partners.show', $partner->id) }}">Vizualizare</a>
                    <a class="btn btn-primary" href="{{ route('partners.edit', $partner->id) }}">Modificare</a>
                    {!! Form::open(['method' => 'DELETE', 'route' => ['partners.destroy', $partner->id], 'style' => 'display:inline']) !!}
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
