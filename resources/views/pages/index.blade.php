@extends('layouts.home')

@section('content')

<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{URL::asset('/img/logocrop.png')}}" alt="logo" width="100%">
                    {{-- {{ config('app.name', 'Next Gig') }} --}}
                </a>
            </div>
            <div class="col-md-8">
                <h1 class="display-4">Hitta spelningar i Stockholm!</h1>
                <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra
                    attention to featured content or information.</p>
                <hr class="my-4">
                <a class="btn btn-primary btn-lg" href="{{ url('/spelningar') }}" role="button">Sök</a>
            </div>
        </div>
    </div>
</div>
@endsection
