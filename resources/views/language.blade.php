@extends('layouts.main')
@section('content')
    <form class="text-center form" action="{{route('storeLang', $user->id)}}" method="post">
        @csrf()
        <div id="languages">
            <h2 class="title">Kokias programavimo kalbas mokate?</h2>
            <div class="text-left mb-5">
                @foreach($lang as $item)
                    <div class="form-check">
                        <input class="form-check-input" name="lang[]" type="checkbox" value="{{$item->id}}" id="ch1">
                        <label class="form-check-label" for="ch1">
                            {{$item->name}}
                        </label>
                    </div>
                @endforeach
                    <div class="form-check">
                        <input class="form-check-input" name="lang[]" type="checkbox" value=0 id="none">
                        <label class="form-check-label" for="ch6">
                            Nemoku nė vienos.
                        </label>
                    </div>
            </div>
        </div>
        @if($errors->has('name'))
            <div class="col alert alert-danger">
                <small  class="text-danger">
                    {{ $errors->first('name') }}
                </small>
            </div>
        @endif
        <button class="btn btn-success" name="submit" type="submit">Testi</button>
    </form>
@endsection

