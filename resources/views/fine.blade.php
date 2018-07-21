@extends('layouts.main')
@section('content')
    <div class="card text-center" style="width: 18rem;">
        <div class="card-body">
            <h2 class="card-title">{{$user->name}}</h2>
            <br>
            <p class="card-text">Testas baigtas.</p>
            <p class="card-text">Ačiū kad pateikėte savo atsakymus.</p>
        </div>
    </div>
@endsection