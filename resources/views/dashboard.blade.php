@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 dashboard">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h1 class="dashboard-header">Välkommen {{ Auth::user()->name }}!</h1>
                    <div class="dashboard-content">
                        
                        <h2 class="">Mina upplagda spelningar:</h2>

                        @if(count($posts) > 0)
                        @foreach($posts as $post)
                           
                            <div class="card">
                                <a href='/{{  "spelningar/" . $post->id}}'>
                                    <h3>{{$post->title}}, {{$post->date}}</h3>
                                    <h3></h3>
                                    <span>{{$post->body}}</span>
                                    <span>{{$post->location}}, Stockholm </span>
                                    <a href="" class="save-icon">Spara</a>
                                    <br>
                                   
                                </a>
                            </div>      
                        @endforeach
                        {{-- Paginering --}}
                        {{-- {{$posts->links()}} --}}
                    @else
                        <p>Inga spelningar hittades!</p>
                    @endif


           
             
          
        </div>
        <div class="dashboard-buttons">
            <a class="btn create-btn" href="/spelningar/create">Lägg till spelning<span class="sr-only">(current)</span></a>
            <a class="btn logout-btn" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                {{ __('Logga ut') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </div>
</div>
@endsection
