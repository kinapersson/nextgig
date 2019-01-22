@extends('layouts.app')

@section('content')

    <a href="/spelningar" class="btn btn-default">Gå tillbaka</a>
    
    <div class="card">    
        <h1>{{$post->title}}</h1>      
        <span>{{$post->body}}</span>
        <span>{{$post->location}}</span>
        <span>{{$post->date}}</span>
        {{-- <span>{{$post->img}}</span> --}}
        {{-- <span>{{$post->links}}</span> --}}
    </div>
    <hr>
    <a href="/spelningar/{{$post->id}}/edit" class="btn btn-default">Redigera</a>

    {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'justify-content-end'])!!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
    {!!Form::close()!!}
@endsection