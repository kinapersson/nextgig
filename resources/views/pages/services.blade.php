@extends('layouts.app')

@section('content')
        <h1>Mina services</h1>
        {{-- Kollar om services-arrayen har någon data och matar ut det--}}
        @if(count($services) > 0)
            <ul class="list-group">
                @foreach($services as $service)
                    <li class="list-group-item">{{$service}}</li>
                @endforeach
            </ul>
        @endif
@endsection