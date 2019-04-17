
@extends('layouts.app')

@section('content')
    <h1>Spelningar</h1>


           
            <div class="card">
                <a href="">
                    <h3>En sparad spelning</h3>
                    <span>2019-02-12</span>
                    <span>Debaser, Stockholm </span>              
                </a>
            </div>   
            
            <div class="card">
                <a href="">
                    <h3>En till sparad spelning</h3>
                    <span>2019-02-12</span>
                    <span>Debaser, Stockholm </span>              
                </a>
            </div>     
            <div class="card">
                <a href="">
                    <h3>En till sparad spelning</h3>
                    <span>2019-02-12</span>
                    <span>Debaser, Stockholm </span>              
                </a>
            </div>   
            
            <button class="btn btn-spotify btn-playlist-spotify">Skapa spellista</button>
  
        {{-- Paginering --}}
        {{-- {{$posts->links()}} --}}
    {{-- @else
        <p>Inga spelningar hittades!</p>
    @endif --}}
@endsection