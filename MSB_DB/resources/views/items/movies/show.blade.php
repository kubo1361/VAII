@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8">
            <img src="{{ $movie -> image }}"class="w-100">
        </div>
        <div class="col-4">
            <div class="d-flex align-items-center">
                <div class="pr-3">
                    <img src="{{ $movie->user->profile->profileImage()}}" class="w-100 rounded-circle" style="max-width:40px;">
                </div>
                <div>
                    <div class="font-weight-bold">
                    <a href="/profile/{{ $movie->user->id }}">
                    <span class="text-dark">
                        {{ $movie->user->username }}
                    </span>
                    </a>
                    </div>
                </div>
            </div>
            <hr>
            <div>
                <div class="font-weight-bold">Name: {{ $movie->name }}</div>
                <div class="font-weight-bold">Rating: {{ $movie->rating }}%</div>
                <div class="font-weight-bold">Comment: </div>
                <div>{{$movie->comment}}</div>
            </div>
        </div>
    </div>
</div>
@endsection
