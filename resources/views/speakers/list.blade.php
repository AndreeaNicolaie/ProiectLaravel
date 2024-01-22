@extends('layouts.app')

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="panel panel-default">
        <div class="panel-heading">
            Lista speakerilor
        </div>
        <div class="panel-body">
            <div class="form-group">
                <div class="pull-right">
                    <a href="{{ route('speakers.create') }}" class="btn btn-default">Adăugare Speaker Nou</a>
                </div>
            </div>

            <table class="table table-bordered table-stripped">
                <tr>
                    <th width="20">Nr.</th>
                    <th>Nume</th>
                    <th>Prenume</th>
                    <th>Email</th>
                    <th>Telefon</th>
                    <th>Bio</th>
                    <th width="300">Acțiune</th>
                </tr>
                @if (count($speakers) > 0)
                    @foreach ($speakers as $key => $speaker)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $speaker->Nume }}</td>
                            <td>{{ $speaker->Prenume }}</td>
                            <td>{{ $speaker->Email }}</td>
                            <td>{{ $speaker->Telefon }}</td>
                            <td>{{ $speaker->Bio }}</td>
                            <td>
                                <a class="btn btn-success" href="{{ route('speakers.show', $speaker->id) }}">Vizualizare</a>
                                <a class="btn btn-primary" href="{{ route('speakers.edit', $speaker->id) }}">Modificare</a>
                                {!! Form::open(['method' => 'DELETE','route' => ['speakers.destroy', $speaker->id],'style'=>'display:inline']) !!}
                                {!! Form::submit('Șterge', ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="6">Nu există speakeri!</td>
                    </tr>
                @endif
            </table>
            <!-- Paginația -->
            {{ $speakers->render() }}
        </div>
    </div>
@endsection
