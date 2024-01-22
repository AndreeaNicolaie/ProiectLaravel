@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Modificare Informații Eveniment</div>
        <div class="panel-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Eroare:</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {!! Form::model($event, ['method' => 'PATCH', 'route' => ['events.update', $event->id]]) !!}
                <div class="form-group">
                    <label for="Nume_Eveniment">Nume Eveniment</label>
                    <input type="text" name="Nume_Eveniment" class="form-control" value="{{ $event->Nume_Eveniment }}">
                </div>

                <div class="form-group">
                    <label for="Descriere">Descriere</label>
                    <textarea name="Descriere" class="form-control" rows="3">{{ $event->Descriere }}</textarea>
                </div>

                <div class="form-group">
                    <label for="Image_path">Cale Imagine</label>
                    <input type="text" name="Image_path" class="form-control" value="{{ $event->Image_path }}">
                </div>

                <div class="form-group">
                    <label for="Data_Start">Data Început</label>
                    <input type="datetime-local" name="Data_Start" class="form-control" value="{{ $event->Data_Start }}">
                </div>

                <div class="form-group">
                    <label for="Data_Finish">Data Sfârșit</label>
                    <input type="datetime-local" name="Data_Finish" class="form-control" value="{{ $event->Data_Finish }}">
                </div>

                <div class="form-group">
                    <label for="Locatie">Locație</label>
                    <input type="text" name="Locatie" class="form-control" value="{{ $event->Locatie }}">
                </div>

                <div class="form-group">
                    <label for="Numar_Participant_Maxim">Număr Maxim Participanți</label>
                    <input type="number" name="Numar_Participant_Maxim" class="form-control" value="{{ $event->Numar_Participant_Maxim }}">
                </div>

                <div class="form-group">
                    <input type="submit" value="Salvare Modificări" class="btn btn-info">
                    <a href="{{ route('events.index') }}" class="btn btn-default">Anulează</a>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
