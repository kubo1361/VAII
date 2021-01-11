@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="pl-3 d-flex align-items-center justify-content-start">
            <div class="pr-3">
                <img src="{{ $movie->user->profile->profileImage()}}" class="w-100 rounded-circle" style="max-width:40px;">
            </div>
            <div>
                <div class="font-weight-bold pr-1">
                    <a href="/profile/{{ $movie->user->id }}">
                        <span class="text-dark">
                            {{ $movie->user->username }}
                        </span>
                    </a>
                </div>
            </div>
            <div class="mb-n2 vl-l pl-1">
                <form name="deleteItem" action="/m/{{ $movie->id }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="submit" class="material-icons md-18 md-dark" value="delete">
                </form>
            </div>
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="pl-3 d-flex align-items-center justify-content-start">
            <div class="pl-3">
                <div class="font-weight-bold pt-1">Name: {{ $movie->name }}</div>
                <div class="font-weight-bold pt-1">Status: {{ $movie->state }}</div>
                <div class="font-weight-bold pt-1">Rating: {{ $movie->rating }}%</div>
                <div class="font-weight-bold pt-1">Comment: </div>
                <div class=" pt-1">{{$movie->comment}}</div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="p-4">
            <a href="{{ $movie -> image }}">
                <img src="{{ $movie -> image }}"  class="img-fluid">
            </a>
        </div>
    </div>
</div>
@endsection
