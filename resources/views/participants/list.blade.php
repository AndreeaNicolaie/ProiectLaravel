@extends('layouts.app')

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="panel panel-default">
        <div class="panel-heading">
            Lista participanților
        </div>
        <div class="panel-body">
            <div class="form-group">
                <div class="pull-right">
                    <a href="{{ route('participants.create') }}" class="btn btn-default">Adaugare Participant Nou</a>
                </div>
            </div>

            <table class="table table-bordered table-stripped">
                <tr>
                    <th width="20">Nr.</th>
                    <th>Nume</th>
                    <th>Prenume</th>
                    <th>Email</th>
                    <th>Telefon</th>
                    <th width="300">Actiune</th>
                </tr>
                @if (count($participants) > 0)
                    @foreach ($participants as $key => $participant)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $participant->Nume }}</td>
                            <td>{{ $participant->Prenume }}</td>
                            <td>{{ $participant->Email }}</td>
                            <td>{{ $participant->Telefon }}</td>
                            <td>
                                <a class="btn btn-success" href="{{ route('participants.show', $participant->id) }}">Vizualizare</a>
                                <a class="btn btn-primary" href="{{ route('participants.edit', $participant->id) }}">Modificare</a>
                                {!! Form::open(['method' => 'DELETE','route' => ['participants.destroy', $participant->id],'style'=>'display:inline']) !!}
                                {!! Form::submit('Sterge', ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4">Nu exista participanti!</td>
                    </tr>
                @endif
            </table>
            <!-- Paginația -->
            {{ $participants->render() }}
        </div>
    </div>
@endsection
