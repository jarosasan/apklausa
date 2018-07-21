@extends('layouts.main')
@section('content')
    <form class="text-center form" action="{{route('storeFile', $user->id)}}" method="post" enctype="multipart/form-data">
        @csrf()
        <div id="files">
            <h2 class="title">Prašome patalpinti savo nuotrauka.</h2>
            <div class="custom-file">
                <input type="file" class="custom-file-input" name="file" id="customFile">
                <label class="custom-file-label" for="customFile">Pasirinkite nuotrauką</label>
            </div>
        </div>
        @if($errors->has('file'))
            <div class="col alert alert-danger">
                <small  class="text-danger">
                    {{ $errors->first('file') }}
                </small>
            </div>
        @endif
        <button class="btn btn-success" name="submit" type="submit">Testi</button>
    </form>
@endsection