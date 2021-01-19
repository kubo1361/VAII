@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="pl-3 d-flex align-items-center justify-content-start">
            <div class="pr-3">
                <img src="{{ $movie->user->profile->profileImage()}}" class="rounded-circle" style="width: 3rem;">
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
            @can('update', $movie->user->profile)
            <div class="pt-1 pl-1 vl-l">
                <form name="editItem" action="/m/{{ $movie->id }}/e" enctype="multipart/form-data" method="GET">
                    @csrf
                    @method('GET')
                    <input type="image" class="material-icons md-18 md-dark" value="edit">
                </form>
            </div>
            <div class="font-weight-bold">
                <->
            </div>
            <div class="pt-1 pl-1">
                <form name="deleteItem" action="/m/{{ $movie->id }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="image" class="material-icons md-18 md-dark" value="delete">
                </form>
            </div>
            @endcan
            @cannot('update', $movie->user->profile)
            <div class="mb-n2">
                <form name="copy" action="/m/{{ $movie->id }}/c" enctype="multipart/form-data" method="GET">
                    @csrf
                    @method('GET')
                    <input type="image" class="material-icons md-18 md-dark" value="add">
                </form>
            </div>
            @endcannot
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
        <div class="p-4" style="width: 50rem;">
            <a href="{{ $movie -> image }}">
                <img src="{{ $movie -> image }}" class="img-fluid">
            </a>
        </div>
    </div>
</div>
@endsection