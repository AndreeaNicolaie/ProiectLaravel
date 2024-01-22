@extends('layouts.app')

@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<div class="panel panel-default">
    <div class="panel-heading">
        Lista Speakeri - Sesiuni
    </div>
    <div class="panel-body">
        <div class="form-group">
            <div class="pull-right">
                <a href="{{ route('speakers_sessions.create') }}" class="btn btn-default">Adăugare Legătură Nouă</a>
            </div>
        </div>

        <table class="table table-bordered table-stripped">
            <tr>
                <th width="20">Nr.</th>
                <th>Speaker</th>
                <th>Sesiune</th>
                <th width="300">Acțiune</th>
            </tr>
            @if (count($speakers_sessions) > 0)
            @foreach ($speakers_sessions as $key => $speakers_session)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $speakers_session->speaker->Nume . ' ' . $speakers_session->speaker->Prenume }}</td> <!-- Presupunând că modelul Speaker are un atribut NumeSpeaker -->
                <td>{{ $speakers_session->session->Nume_Sesiune }}</td> <!-- Presupunând că modelul Session are un atribut Nume_Sesiune -->
                <td>
                    <a class="btn btn-success" href="{{ route('speakers_sessions.show', $speakers_session->id) }}">Vizualizare</a>
                    <a class="btn btn-primary" href="{{ route('speakers_sessions.edit', $speakers_session->id) }}">Modificare</a>
                    {!! Form::open(['method' => 'DELETE', 'route' => ['speakers_sessions.destroy', $speakers_session->id], 'style' => 'display:inline']) !!}
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
