@extends('layouts.app')

@section('content')


<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4">Hitta spelningar i Stockholm!</h1>
        <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
        <hr class="my-4">
       
        <a class="btn btn-primary btn-lg" href="{{ url('/spelningar') }}" role="button">Sök</a>
    </div>
</div>



<a class="navbar-brand" href="{{ url('/spelningar') }}">
    <img src="{{URL::asset('/img/logotagline.png')}}" alt="logotagline" height="100" width="300">
      {{-- {{ config('app.name', 'Next Gig') }} --}}
  </a>
@endsection 