@extends('layouts.app')

@section('content')
    <h1>Redigera spelning</h1>

  
    {!! Form::open(['action' => ['PostsController@update', $post->id], 'method' => 'POST']) !!}   {{-- Här skickas även ID med --}}
        <div class="form-group">
            {{Form::label('title', 'Titel')}}
            {{Form::text('title', $post->title, ['class' => 'form-control', 'placeholder' => ''])}}
        </div>
        <div class="form-group">
            {{Form::label('body', 'Beskrivning')}}
            {{Form::textarea('body', $post->body, [ 'id' => '{{--article-ckeditor--}}', 'class' => 'form-control', 'placeholder' => ''])}}
        </div>
        <div class="form-group">
            {{Form::label('location', 'Lokal')}}
            {{Form::text('location', $post->location, ['class' => 'form-control', 'placeholder' => ''])}}
        </div>
        <div class="form-group">
            {{Form::label('date', 'Datum')}}
            {{Form::date('date', $post->date, [ 'id' => '{{--article-ckeditor--}}', 'class' => 'form-control', 'placeholder' => ''])}}
        </div>

        {{-- Eftersom det inte går att använda PUT i formuläret ovan gör man ett gömt formulär med PUT-metoden i --}}
        {{Form::hidden('_method', 'PUT')}}

        {{Form::submit('Skicka', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}

@endsection