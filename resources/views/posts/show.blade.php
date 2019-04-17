@extends('layouts.app')

@section('content')

    <a href="/spelningar" class="return">< Gå tillbaka</a>
    
    <div class="item">
        <div class="row">
            <div class="col-md-8">
                <h1>{{$post->title}}</h1> 
                <br>    
                <span>{{$post->body}}</span>
                <h4>{{$post->location}}</h4>
                <span>{{$post->date}}</span>
                <br>
                <span>{{$post->street}}</span>
                <br>
                <span>{{$post->zip}}</span>
                <br>
                <span>{{$post->city}}</span>
                <br>
            </div>
            <div class="col-md-4 text-right">        
            
            {{-- Visar endast redigera-verktyg om det är mitt eget api samt endast om man är inloggad --}}

            @if($user = Auth::user())
                @if(!isset($_GET["src"])) 
                    <div class="admin-tools">
                        <h3>Admin-verktyg</h3>
                        <a href="/spelningar/{{$post->id}}/edit" class="btn btn-default">Redigera spelning</a>
                
                        {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'edit-form'])!!}
                            {{Form::hidden('_method', 'DELETE')}}
                            {{Form::submit('Ta bort spelning', ['class' => 'btn'])}}
                        {!!Form::close()!!}
                    </div>
                @endif
            @endif
           </div>
         </div>
    </div>    

        <hr>
        <a href="{{$post->uri}}" class="btn">Köp biljett</a>    
        <a href="" class="btn btn-save">Spara<i class="fas fa-heart"></i></a>
        <a href="https://open.spotify.com/search/artists/{{rawurlencode ($post->title)}}" target="_blank" class="btn btn-spotify">Lyssna på Spotify</a>
        {{-- <span>{{$post->img}}</span> --}}
        {{-- <span>{{$post->links}}</span> --}}

 
    <hr>


@endsection