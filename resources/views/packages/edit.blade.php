@extends('layouts.app')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Modificare Informații Pachet</div>
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

            {!! Form::model($package, ['method' => 'PATCH', 'route' => ['packages.update', $package->id]]) !!}
                <div class="form-group">
                    <label for="Nume_Pachet">Nume Pachet</label>
                    <input type="text" name="Nume_Pachet" class="form-control" value="{{ $package->Nume_Pachet }}">
                </div>

                <div class="form-group">
                    <label for="Descriere">Descriere</label>
                    <textarea name="Descriere" class="form-control" rows="3">{{ $package->Descriere }}</textarea>
                </div>

                <div class="form-group">
                    <label for="Pret">Pret</label>
                    <input type="text" name="Pret" class="form-control" value="{{ $package->Pret }}">
                </div>

                <div class="form-group">
                    <input type="submit" value="Salvare Modificări" class="btn btn-info">
                    <a href="{{ route('packages.index') }}" class="btn btn-default">Anulează</a>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection