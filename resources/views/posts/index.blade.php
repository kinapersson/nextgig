

@extends('layouts.app')

@section('content')
    <h1>Spelningar</h1>
    
    <div class="select">
        <label>Sök på datum:</label>
        <select>     
        <option value="idag">Idag</option>
        <option value="imorgon">Imorgon</option>
        {{-- <option value=""></option>
        <option value=""></option> --}}
        </select>
    </div>

    @if(count($posts) > 0)
        @foreach($posts as $post)
           
            <div class="card">
                <a href='/{{ isset($post["skid"]) ? "spelningar/" . $post["skid"] . "?src=songkick" : "spelningar/" . $post->id}}'>
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
@endsection