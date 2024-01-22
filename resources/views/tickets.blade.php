@extends('layoutcos')

@section('title', 'Tickets')

@section('content')
    <div class="container products">
        <div class="row">
            @foreach($tickets as $ticket)
                <div class="col-xs-18 col-sm-6 col-md-3">
                    <div class="thumbnail">
                        <img src="{{ asset('images/poster_bilet.jpg') }}" width="500" height="300">
                        <div class="caption">
                            <h4>{{ $ticket->Tip_Bilet}}</h4>
                            <p><strong>Pret: </strong> {{ $ticket->Pret }}$</p>
                            <p class="btn-holder"><a href="{{ url('add-to-cart/'.$ticket->id) }}" class="btn btn-warning btn-block text-center" role="button">Add to Cart</a> </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div><!-- End row -->
    </div>
@endsection
