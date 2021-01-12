@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card-columns">
        @foreach($friends as $friend)
            <div class="card bg-light" style="width: 10rem;">
                <img class="card-img-top" src="{{ $friend->profile->profileImage() }}">
                <div class="card-body">
                    <div class="card-text font-weight-bold text-black pb-1">
                        <a href="{{ '/profile/' . $friend->id }}" class="stretched-link text-secondary">{{ $friend->username }}</a>
                    </div>
                    <div class="card-text">{{ $friend->profile->description }}</div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection