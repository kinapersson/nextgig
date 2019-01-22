@extends('layouts.app')

@section('content')
    <h1>Spelningar</h1>
    @if(count($posts) > 0)
        @foreach($posts as $post)

            <div class="card">
                <a href="/spelningar/{{$post->id}}">
                    <h3>{{$post->title}}</h3>
                    <span>{{$post->body}}</span>
                    <span>{{$post->location}}</span>
                    <span>{{$post->date}}</span>
                </a>
            </div>      
        @endforeach
        {{-- Paginering --}}
        {{-- {{$posts->links()}} --}}
    @else
        <p>Inga spelningar hittades!</p>
    @endif
@endsection