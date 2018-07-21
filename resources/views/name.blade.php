@extends('layouts.main')
@section('content')
    <form class="text-center form" action="{{route('storeName')}}" method="post">
        @csrf()
        <div id="name">
            <h2 class="title">Koks jūsų vardas?</h2>
            <div class="form-group">
                <input type="text" class="form-control form-control-lg" id="name" name="name" aria-describedby="emailHelp" placeholder="Name">
            </div>
            @if($errors->has('name'))
                <div class="col alert alert-danger">
                    <small  class="text-danger">
                        {{ $errors->first('name') }}
                    </small>
                </div>
            @endif
        </div>
        <button class="btn btn-success btn-lg" name="submit" type="submit">Testi</button>
    </form>
@endsection

