@extends('layouts.master')

@section('content')
<div class="jumbotron" style="background-color: #f0f0f0; padding: 20px; border-radius: 10px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
    <h2 class="text-center text-dark">Our Festival</h2>
    <p class="text-center text-secondary">Join us to watch the latest movies, meet the actors, and take memorable photos with them!</p>
</div>

<div id="learn-more" class="container" style="padding-top: 20px;">
    <h2 class="text-center">Event</h2>
    <p class="text-center">Learn more about what we have to offer</p>
    <div class="row">
        <div class="col-md-4">
            <a href="{{ route('events.index') }}" class="btn btn-light btn-block btn-lg">Events</a>
        </div>
        <div class="col-md-4">
            <a href="{{ route('tickets.index') }}" class="btn btn-light btn-block btn-lg">Tickets</a>
        </div>
        <div class="col-md-4">
            <a href="{{ route('packages.index') }}" class="btn btn-light btn-block btn-lg">Packages</a>
        </div>
        <div class="col-md-4">
            <a href="{{ route('partners.index') }}" class="btn btn-light btn-block btn-lg">Partners</a>
        </div>
        <div class="col-md-4">
            <a href="{{ route('sponsors.index') }}" class="btn btn-light btn-block btn-lg">Sponsors</a>
        </div>
        <div class="col-md-4">
            <a href="{{ route('agendas.index') }}" class="btn btn-light btn-block btn-lg">Agendas</a>
        </div>
        <div class="col-md-4">
            <a href="{{ route('participants.index') }}" class="btn btn-light btn-block btn-lg">Participants</a>
        </div>
        <div class="col-md-4">
            <a href="{{ route('speakers.index') }}" class="btn btn-light btn-block btn-lg">Speakers</a>
        </div>
        <div class="col-md-4">
            <a href="{{ route('sessions.index') }}" class="btn btn-light btn-block btn-lg">Sessions</a>
        </div>
        <div class="col-md-4">
            <a href="{{ route('speakers_sessions.index') }}" class="btn btn-light btn-block btn-lg">Speaker Sessions</a>
        </div>
        <div class="col-md-4">
            <a href="{{ route('shop.index') }}" class="btn btn-light btn-block btn-lg">Shop</a>
        </div>
        <div class="col-md-4">
            <a href="{{ route('contact.index') }}" class="btn btn-light btn-block btn-lg">Contact</a>
        </div>
    </div>
</div>

<style>
    .btn {
        background-color: #f8f9fa;
        color: #333;
        border-radius: 5px;
        text-decoration: none;
        margin-bottom: 10px;
    }

    .btn:hover {
        background-color: #e9ecef;
        color: #333;
    }
</style>

<script>
    $(document).ready(function() {
        $('.btn').hover(
            function() {
                $(this).addClass('btn-dark');
            },
            function() {
                $(this).removeClass('btn-dark');
            }
        );
    });
</script>
@endsection
