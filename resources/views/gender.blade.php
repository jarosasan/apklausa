@extends('layouts.main')
@section('content')
    <form class="text-center form" action="{{route('storeGender', $user->id)}}" method="post">
        @csrf()
        <div id="lytis">
            <h2 class="title">Lytis.</h2>
            <div class="form-row mb-5">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="exampleRadios1" value="vyras" checked>
                    <label class="form-check-label" for="exampleRadios1">
                        Vyras
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="exampleRadios2" value="moteris">
                    <label class="form-check-label" for="exampleRadios2">
                        Moteris
                    </label>
                </div>
            </div>
        </div>
        @if($errors->has('gender'))
            <div class="col alert alert-danger">
                <small  class="text-danger">
                    {{ $errors->first('gender') }}
                </small>
            </div>
        @endif
        <button class="btn btn-success" name="submit" type="submit">Testi</button>
    </form>
@endsection

