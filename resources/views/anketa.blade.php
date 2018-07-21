@extends('layouts.main')
@section('content')
    <div class="container summary">
        @if(isset($image->file_name))
            <div class="image mb-4">
                <img src="{{asset('storage/images'.$image->file_name)}}" alt="{{$user->name}}" class="img-thumbnail">
            </div>
        @endif
        <h3 class="text-center">{{$user->name}}</h3>
            <hr>
            <br>
        <p><b>Gymino metai: </b>{{$user->birth_day}}</p>
            <hr>
            <br>
        <p><b>Litys: </b>{{$user->gender}}</p>
            <hr>
            <br>
        <div>
            <b>Programavimo kalbas: </b>
            <br>
            <br>
            @foreach($lan as $l)
                <p> {{$l->name}} </p>
            @endforeach

        </div>
            <hr>
    </div>
@endsection