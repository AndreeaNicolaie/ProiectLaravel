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
                    <a href="/events/create" class="btn btn-default">Adaugare Eveniment Nou</a>
                </div>
            </div>

            <table class="table table-bordered table-stripped">
                <tr>
                    <th width="20">Nr.</th>
                    <th>Nume Eveniment</th>
                    <th>Descriere</th>
                    <th>Image_Path</th>
                    <th>Data_Start</th>
                    <th>Data_Finish</th>
                    <th>Locatie</th>
                    <th>Numar_Participant_Maxim</th>
                    <th width="300">Actiune</th>
                </tr>
                @if (count($events) > 0)
                    @foreach ($events as $key => $event)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $event->Nume_Eveniment }}</td>
                            <td>{{ $event->Descriere }}</td>
                            <td>{{ $event->Image_Path}}</td>
                            <td>{{ $event->Data_Start }}</td>
                            <td>{{ $event->Data_Finish }}</td>
                            <td>{{ $event->Locatie }}</td>
                            <td>{{ $event->Numar_Participant_Maxim }}</td>
                            <td>
                                <a class="btn btn-success" href="{{ route('events.show', $event->id) }}">Vizualizare</a>
                                <a class="btn btn-primary" href="{{ route('events.edit', $event->id) }}">Modificare</a>
                                {!! Form::open(['method' => 'DELETE','route' => ['events.destroy', $event->id],'style'=>'display:inline']) !!}
                                {!! Form::submit('Sterge', ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4">Nu exista evenimente!</td>
                    </tr>
                @endif
            </table>
            <!-- Paginația -->
            {{ $events->render() }}
        </div>
    </div>
@endsection
