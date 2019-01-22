@extends('layouts.app')

@section('content')
    <h1>Lägg upp spelning</h1>

    {{-- Input-datan hamnar i storefunktionen --}}
    {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST']) !!} 
        <div class="form-group">
            {{Form::label('title', 'Titel')}}
            {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => ''])}}
        </div>
        <div class="form-group">
            {{Form::label('body', 'Beskrivning')}}
            {{Form::textarea('body', '', [ 'id' => '{{--article-ckeditor--}}', 'class' => 'form-control', 'placeholder' => ''])}}
        </div>
        {{Form::submit('Skicka', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}

@endsection