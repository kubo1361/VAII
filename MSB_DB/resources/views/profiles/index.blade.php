@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-2 pl-3 d-flex align-items-center">
            <img src="{{ $user->profile->profileImage() }}" class="nonimportant rounded-circle w-100">
        </div>
        <div class="col-sm-10 pt-1 pl-3">
            <div class="d-flex justify-content-start align-items-center">
                <div class="h4 pt-1 pr-2">{{ $user->username }}</div>
                @can('update', $user->profile)
                <div class="vl-l pl-2">
                    <a href="/profile/{{$user->id}}/edit">
                        <i class="material-icons md-18 md-dark mt-1">edit</i>
                    </a>
                </div>
                @endcan
                @cannot('ownProfile', $user->profile)
                <div class="pl-1" id="AddFriendButton" userId="{{ auth()->user()->id }}" friendId="{{ $user->id }}"
                    friends="{{ $friendshipStatus }}"></div>
                @endcannot
            </div>
            <div class="d-flex">
                <div class='pr-3'><strong>{{ $moviesCount }}</strong> Movies</div>
                <div class='pr-3'><strong>{{ $seriesCount }}</strong> Series</div>
                <div class='pr-3'><strong>{{ $booksCount }}</strong> Books</div>
            </div>
            <hr>
            <div>{{ $user->profile->description }}</div>
        </div>
    </div>

    <hr>

    <div class="row pl-3 pt-4 d-flex align-items-center">
        <div class="font-weight-bold pr-2">MOVIES</div>
        @can('update', $user->profile)
        <div class="pl-2 vl-l">
            <a href="/m/create">
                <i class="material-icons md-18 md-dark mt-1">add</i>
            </a>
        </div>
        @endcan
    </div>

    @if($moviesCount == 0)
    @can('update', $user->profile)
    <p class="lead text-center pt-2"> There are no movies. Try adding one :)</p>
    @endcan
    @cannot('update', $user->profile)
    <p class="lead text-center pt-2"> {{ $user->username }} haven't added any movies yet.</p>
    @endcannot
    @else
    <div class="row pt-1 d-flex flex-row flex-nowrap overflow-auto">
        @foreach($movies as $movie)
        <div class="col">
            <div class="card bg-secondary" style="width: 10rem;">
                <img class="card-img-top" src="{{ $movie->image }}">
                <div class="card-body d-flex align-items-center">
                    <div class="card-text font-weight-bold pr-2" style="border-right:1px solid black">
                        <a href="/m/{{ $movie->id }}" class="stretched-link text-white">{{ $movie->name }}</a>
                    </div>
                    <div class="card-text font-weight-bold pl-2">{{ $movie->rating . '%' }}</div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endif


    <div class="row pl-3 pt-4 d-flex align-items-center">
        <div class="font-weight-bold pr-3">SERIES</div>
        @can('update', $user->profile)
        <div class="pl-2 vl-l">
            <a href="/m/create">
                <i class="material-icons md-18 md-dark mt-1">add</i>
            </a>
        </div>
        @endcan
    </div>

    @if($seriesCount == 0)
    @can('update', $user->profile)
    <p class="lead text-center pt-2"> There are no series. Try adding one :)</p>
    @endcan
    @cannot('update', $user->profile)
    <p class="lead text-center pt-2"> {{ $user->username }} haven't added any series yet.</p>
    @endcannot
    @else
    <div class="row pt-1 d-flex flex-row flex-nowrap overflow-auto">
        <div class="col">

        </div>
    </div>
    @endif

    <div class="row pl-3 pt-4 d-flex align-items-center">
        <div class="font-weight-bold pr-3">BOOKS</div>
        @can('update', $user->profile)
        <div class="pl-2 vl-l">
            <a href="/m/create">
                <i class="material-icons md-18 md-dark mt-1">add</i>
            </a>
        </div>
        @endcan
    </div>

    @if($booksCount == 0)
    @can('update', $user->profile)
    <p class="lead text-center pt-2"> There are no books. Try adding one :)</p>
    @endcan
    @cannot('update', $user->profile)
    <p class="lead text-center pt-2"> {{ $user->username }} haven't added any books yet.</p>
    @endcannot
    @else
    <div class="row pt-1 d-flex flex-row flex-nowrap overflow-auto">
        <div class="col">

        </div>
        @endif
    </div>
    @endsection