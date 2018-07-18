@extends('layouts.main')
@section('content')
    <form class="text-center" action="{{route('storeName')}}" method="post">
        @csrf()
        <div id="name">
            <h2 class="mb-10">Koks jūsų vardas?</h2>
            <div class="form-group">
                <label for="exampleInputName">Your name</label>
                <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" placeholder="Name">
            </div>
            @if($errors->has('name'))
                <div class="col alert alert-danger">
                    <small  class="text-danger">
                        {{ $errors->first('name') }}
                    </small>
                </div>
            @endif
        </div>
        <button class="btn btn-success" name="submit" type="submit">Testi</button>
    </form>
@endsection

