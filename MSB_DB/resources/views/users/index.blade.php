@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card-columns">
        @foreach($users as $user)
            <div class="card bg-light" style="width: 10rem;">
                <img class="card-img-top" src="{{ $user->profile->profileImage() }}">
                <div class="card-body">
                    <div class="card-text font-weight-bold text-black pb-1">
                        <a href="{{ '/profile/' . $user->id }}" class="stretched-link text-secondary">{{ $user->username }}</a>
                    </div>
                    <div class="card-text">{{ $user->profile->description }}</div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection