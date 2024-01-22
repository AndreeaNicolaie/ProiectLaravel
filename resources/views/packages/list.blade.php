@extends('layouts.app')
@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="panel panel-default">
        <div class="panel-heading">
            Lista Pachetelor
        </div>
        <div class="panel-body">
            <div class="form-group">
                <div class="pull-right">
                    <a href="{{ route('packages.create') }}" class="btn btn-default">Adaugare Pachet Nou</a>
                </div>
            </div>

            <table class="table table-bordered table-stripped">
                <tr>
                    <th width="20">Nr.</th>
                    <th>Nume Pachet</th>
                    <th>Descriere</th>
                    <th>Pret</th>
                    <th width="300">Acțiune</th>
                </tr>
                @if (count($packages) > 0)
                    @foreach ($packages as $key => $package)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $package->Nume_Pachet }}</td>
                            <td>{{ $package->Descriere }}</td>
                            <td>{{ $package->Pret }}</td>
                            <td>
                                <a class="btn btn-success" href="{{ route('packages.show', $package->id) }}">Vizualizare</a>
                                <a class="btn btn-primary" href="{{ route('packages.edit', $package->id) }}">Modificare</a>
                                {!! Form::open(['method' => 'DELETE','route' => ['packages.destroy', $package->id],'style'=>'display:inline']) !!}
                                {!! Form::submit('Sterge', ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4">Nu exista pachete!</td>
                    </tr>
                @endif
            </table>
            <!-- Paginația -->
            {{ $packages->links() }}
        </div>
    </div>
@endsection