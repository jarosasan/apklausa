@extends('layouts.main')
@section('content')
    <form class="text-center" action="{{route('storeTest', $id)}}" method="post">
        @csrf()
        <div id="test">
            <h2>Ar domitės programavimu?</h2>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="test" id="exampleRadios1" value=1 checked>
                <label class="form-check-label" for="exampleRadios1">
                    Taip
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="test" id="exampleRadios2" value=0>
                <label class="form-check-label" for="exampleRadios2">
                    Ne
                </label>
            </div>
        </div>
        @if($errors->has('test'))
            <div class="col alert alert-danger">
                <small  class="text-danger">
                    {{ $errors->first('test') }}
                </small>
            </div>
        @endif
        <button class="btn btn-success" name="submit" type="submit">Testi</button>
    </form>
@endsection

