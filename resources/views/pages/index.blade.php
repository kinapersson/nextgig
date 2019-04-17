@extends('layouts.home')

@section('content')

<div class="jumbotron">
    <div class="container">
  
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{URL::asset('/img/logocrop.png')}}" alt="logo" width="100%">
                    {{-- {{ config('app.name', 'Next Gig') }} --}}
            </a>
            <h3>Hitta spelningar i Stockholm!</h3>
            <a href="/spelningar">
            <div class="lightning"></div>
        </a>
            {{-- <a class="btn btn-primary btn-lg" href="{{ url('/spelningar') }}" role="button">GO!</a> --}}
        </div>

     
    </div>
</div>
@endsection
