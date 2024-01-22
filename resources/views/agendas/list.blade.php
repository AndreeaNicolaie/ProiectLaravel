@extends('layouts.app')
@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="panel panel-default">
        <div class="panel-heading">
            Lista evenimentelor
        </div>
        <div class="panel-body">
            <div class="form-group">
                <div class="pull-right">
                    <a href="{{ route('agendas.create') }}" class="btn btn-default">Adaugare Agenda Nou</a>
                </div>
            </div>

            <table class="table table-bordered table-stripped">
                <tr>
                    <th width="20">Nr.</th>
                    <th>Nume Eveniment</th> <!-- Change the header -->
                    <th>Nume Sesiune</th>
                    <th>Ora Început</th>
                    <th>Ora Sfârșit</th>
                    <th>Descriere</th>
                    <th width="300">Acțiune</th>
                </tr>
                @if (count($agenda) > 0)
                    @foreach ($agenda as $key => $item)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $item->event->Nume_Eveniment }}</td> <!-- Display the event's name -->
                            <td>{{ $item->Nume_Sesiune }}</td>
                            <td>{{ $item->Ora_Start }}</td>
                            <td>{{ $item->Ora_Finish }}</td>
                            <td>{{ $item->Descriere }}</td>

                            <td>
                                <a class="btn btn-success" href="{{ route('agendas.show', $item->id) }}">Vizualizare</a>
                                <a class="btn btn-primary" href="{{ route('agendas.edit', $item->id) }}">Modificare</a>
                                {!! Form::open(['method' => 'DELETE','route' => ['agendas.destroy', $item->id],'style'=>'display:inline']) !!}
                                {!! Form::submit('Șterge', ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="7">Nu există evenimente!</td>
                    </tr>
                @endif
            </table>
            <!-- Paginația -->
            {{ $agenda->links() }}
        </div>
    </div>
@endsection
